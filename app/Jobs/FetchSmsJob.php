<?php

namespace App\Jobs;

use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Queue\Queueable;
use Illuminate\Support\Facades\Http;
use App\Models\ResidentsConcerns;
use Exception;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Cache;

class FetchSmsJob implements ShouldQueue
{
    use Queueable;

    protected $apiKey;
    protected $deviceId;

    /**
     * Create a new job instance.
     */
    public function __construct($apiKey, $deviceId)
    {
        $this->apiKey = $apiKey;
        $this->deviceId = $deviceId;
    }

    /**
     * Execute the job.
     */
    public function handle()
    {
        try {
            // Fetch the SMS messages from the TextBee API
            $response = Http::withHeaders([
                'x-api-key' => $this->apiKey,
            ])->get("https://api.textbee.dev/api/v1/gateway/devices/{$this->deviceId}/get-received-sms");

            if ($response->successful()) {
                $messages = $response->json()['data']; // Adjusting to access 'data' key in response

                // Get the timestamp of the last processed message
                $lastProcessedTimestamp = Cache::get('last_processed_timestamp', 0);

                // Filter messages by latest received date and check if they are newer than the last processed timestamp
                $newMessages = array_filter($messages, function ($message) use ($lastProcessedTimestamp) {
                    return strtotime($message['receivedAt']) > $lastProcessedTimestamp;
                });

                if ($newMessages) {
                    // Process the latest new message
                    $latestMessage = $this->getLatestMessage($newMessages);
                    if ($latestMessage) {
                        $body = $latestMessage['message'] ?? '';

                        // Validate the format of the message
                        if ($this->isValidFormat($body)) {
                            // Save valid message to the database
                            $parsedMessage = $this->parseMessage($body, $latestMessage['sender']);
                            ResidentsConcerns::create($parsedMessage);

                            // Send a confirmation message to the sender
                            $this->sendConfirmation($latestMessage['sender']);
                        } else {
                            // Send an invalid format response to the sender
                            $this->sendInvalidResponse($latestMessage['sender']);
                        }

                        // Update the last processed timestamp regardless of validity
                        Cache::put('last_processed_timestamp', strtotime($latestMessage['receivedAt']));
                    }
                } else {
                    Log::info('No new messages received.');
                }
            } else {
                // Log an error if the request fails
                Log::error("Failed to fetch SMS: " . $response->body());
            }
        } catch (Exception $e) {
            // Log any exception that occurs during execution
            Log::error('Error in FetchSmsJob: ' . $e->getMessage());
        }
    }

    /**
     * Get the latest message based on the receivedAt date.
     *
     * @param array $messages
     * @return array|null
     */
    private function getLatestMessage($messages)
    {
        if (empty($messages)) {
            return null;
        }

        // Sort messages by receivedAt date (latest first)
        usort($messages, function ($a, $b) {
            return strtotime($b['receivedAt']) - strtotime($a['receivedAt']);
        });

        // Return the latest message
        return $messages[0];
    }

    /**
     * Check if the message format is valid.
     *
     * @param string $message
     * @return bool
     */
    private function isValidFormat($message)
    {
        // Simple regex to check if the message follows the desired format
        return preg_match('/^Name:.*\nAddress:.*\nDescription:.*\nDate of Incident:.*/', $message);
    }

    /**
     * Parse the message to extract relevant fields.
     *
     * @param string $message
     * @param string $sender
     * @return array
     */
    private function parseMessage($message, $sender)
    {
        // Use regex to parse the message body
        preg_match('/^Name:(.*)\nAddress:(.*)\nDescription:(.*)\nDate of Incident:(.*)/', $message, $matches);

        // Return an array with the extracted fields, using sender as the contact number
        return [
            'fullname' => trim($matches[1] ?? ''),
            'contact_num' => $sender, // Use sender as contact number
            'address' => trim($matches[2] ?? ''),
            'complaint_details' => trim($matches[3] ?? ''),
            'dateOfIncident' => trim($matches[4] ?? ''),
            'status' => 'Pending',
        ];
    }

    /**
     * Send a confirmation message to the sender.
     *
     * @param string $sender
     * @return void
     */
    private function sendConfirmation($sender)
    {
        $confirmationMessage = "Hello resident! The system has received your complaint. Rest assured, MENRO Balingasag will take best measures to comply with your complaint. Thank you!";

        try {
            // Send the SMS via the TextBee API
            Http::withHeaders([
                'x-api-key' => $this->apiKey,
            ])->post("https://api.textbee.dev/api/v1/gateway/devices/{$this->deviceId}/sendSMS", [
                'recipients' => [$sender],
                'message' => $confirmationMessage,
            ]);

            Log::info("Confirmation message sent to $sender.");
        } catch (Exception $e) {
            // Handle any exceptions that might occur while sending the SMS
            Log::error("Failed to send confirmation message to $sender: " . $e->getMessage());
        }
    }

    /**
     * Send an invalid format response to the sender.
     *
     * @param string $sender
     * @return void
     */
    private function sendInvalidResponse($sender)
    {
        Http::withHeaders([
            'x-api-key' => $this->apiKey,
        ])->post("https://api.textbee.dev/api/v1/gateway/devices/{$this->deviceId}/sendSMS", [
            'recipients' => [$sender],
            'message' => "Invalid message format. Please follow:\nName:\nAddress:\nDescription:\nDate of Incident:",
        ]);

        // Update the last processed timestamp even for invalid messages
        Cache::put('last_processed_timestamp', time());
    }
}
