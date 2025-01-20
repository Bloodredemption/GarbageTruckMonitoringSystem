<?php

namespace App\Http\Controllers;

use App\Events\ComplaintSubmitted;
use App\Models\ResidentsConcerns;
use App\Models\Notification;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Log;

class ResidentsConcernsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('residents-concerns.index');
    }

    public function admin_index() 
    {
        // Fetch the ResidentsConcerns records
        $concerns = ResidentsConcerns::orderBy('created_at', 'desc')->get();

        // Fetch the related notifications
        $concerns->each(function ($concern) {
            $concern->notification = Notification::where('notification_msg', $concern->id)->first();
        });

        return view('admin.residents-concerns.index', compact('concerns'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    public function fetchReceivedSms()
    {
        try {
            // API endpoint to get received SMS
            $apiKey = '60fb227e-604a-4ca9-a8a4-000febc38bae';
            $deviceId = '6732ba5a58ae3b6550860fd2';

            // Fetch SMS from the API
            $response = Http::withHeaders([
                'x-api-key' => $apiKey
            ])->get("https://api.textbee.dev/api/v1/gateway/devices/{$deviceId}/get-received-sms");

            // Check if the response was successful
            if ($response->successful()) {
                $receivedSms = $response->json();

                // Process each received SMS
                foreach ($receivedSms as $sms) {
                    // Extract details from the SMS
                    $message = $sms['message'];
                    $sender = $sms['sender'];

                    // Check if the message follows the required format
                    if ($this->isValidFormat($message)) {
                        // If valid format, save to the database
                        $this->storeComplaintFromSms($message, $sender);
                    } else {
                        // If invalid format, send an error message back to the sender
                        $this->sendInvalidFormatResponse($sender);
                    }
                }

                return response()->json([
                    'message' => 'Received SMS fetched and processed successfully.',
                    'data' => $receivedSms
                ], 200);
            } else {
                return response()->json([
                    'message' => 'Failed to fetch received SMS.',
                    'error' => $response->body()
                ], 500);
            }
        } catch (\Exception $e) {
            return response()->json([
                'message' => 'Error occurred while fetching SMS.',
                'error' => $e->getMessage()
            ], 500);
        }
    }

    private function isValidFormat($message)
    {
        // Define the required format
        $requiredKeys = ['Name:', 'Address:', 'Description:', 'Date of Incident:'];

        // Check if each required key exists in the message
        foreach ($requiredKeys as $key) {
            if (stripos($message, $key) === false) {
                return false; // Missing key
            }
        }

        return true; // All required keys are present
    }

    private function storeComplaintFromSms($message, $sender)
    {
        // Parse the message to extract the details
        $lines = explode("\n", $message);
        $name = $this->extractValue($lines, 'Name:');
        $address = $this->extractValue($lines, 'Address:');
        $description = $this->extractValue($lines, 'Description:');
        $dateOfIncident = $this->extractValue($lines, 'Date of Incident:');

        // Create a new complaint in the database
        ResidentsConcerns::create([
            'fullname' => $name,
            'contact_num' => $sender,
            'address' => $address,
            'complaint_details' => $description,
            'dateOfIncident' => $dateOfIncident,
            'status' => 'Received', // Mark as received
        ]);
    }

    private function extractValue($lines, $key)
    {
        foreach ($lines as $line) {
            if (stripos($line, $key) === 0) {
                return trim(substr($line, strlen($key))); // Remove the key part and return the value
            }
        }

        return ''; // Return an empty string if the key is not found
    }

    private function sendInvalidFormatResponse($sender)
    {
        $invalidMessage = "Your submission was invalid. Please follow the correct format:\n\n" .
                        "Name:\n" .
                        "Address:\n" .
                        "Description:\n" .
                        "Date of Incident:\n\n" .
                        "Please resend your complaint in this format.";

        // Send the invalid format message back to the sender
        Http::withHeaders([
            'x-api-key' => '60fb227e-604a-4ca9-a8a4-000febc38bae',
        ])->post('https://api.textbee.dev/api/v1/gateway/devices/6732ba5a58ae3b6550860fd2/sendSMS', [
            'recipients' => [$sender],
            'message' => $invalidMessage
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // $request->validate([
        //     'complaint_type' => 'required|string|max:255',
        //     'fullname' => 'required|string|max:255',
        //     'contact_num' => 'required|string|max:15',
        //     'brgy_location' => 'required|string|max:255',
        //     'complaint_details' => 'required|string',
        //     'dateOfIncident' => 'required|date',
        //     'attachments.*' => 'image|mimes:jpeg,png,jpg,gif|max:2048', // File validation
        // ]);

        // try {
        //     $attachments = [];
            
        //     // Retrieve renamed filenames from the form data
        //     if ($request->has('renamed_filenames')) {
        //         $renamedFilenames = json_decode($request->input('renamed_filenames'), true);

        //         if ($request->hasFile('attachments')) {
        //             foreach ($request->file('attachments') as $index => $file) {
        //                 // Store the file in the 'public/uploads' directory with its renamed filename
        //                 $path = $file->storeAs('uploads', $renamedFilenames[$index], 'public');
        //                 $attachments[] = $path; // Save the path to the attachments array
        //             }
        //         }
        //     }

        //     // Save complaint with the list of attachment paths as an array in the attachments column
        //     $complaint = ResidentsConcerns::create([
        //         'complaint_type' => $request->complaint_type,
        //         'fullname' => $request->fullname,
        //         'contact_num' => $request->contact_num,
        //         'brgy_location' => $request->brgy_location,
        //         'complaint_details' => $request->complaint_details,
        //         'dateOfIncident' => $request->dateOfIncident,
        //         'attachments' => $attachments, // Store as array (casting in model will handle JSON encoding)
        //     ]);

        //     // Send SMS notification using the new API
        //     $response = Http::withHeaders([
        //         'x-api-key' => '60fb227e-604a-4ca9-a8a4-000febc38bae', // Your API Key
        //     ])->post('https://api.textbee.dev/api/v1/gateway/devices/6732ba5a58ae3b6550860fd2/sendSMS', [
        //         'recipients' => [$complaint->contact_num],
        //         'message' => "Hello {$complaint->fullname}, this is to inform you that your complaint has been received by the system. Rest assured, MENRO Balingasag will take best measures to comply with your complaint. Thank you!\n\n(This is a system-generated message. Please do not reply.)"
        //     ]);

        //     // Check for SMS API response success
        //     if ($response->failed()) {
        //         return response()->json([
        //             'message' => 'Complaint submitted, but failed to send SMS notification.',
        //             'sms_error' => $response->body()
        //         ], 200); // Respond with 200 to indicate the complaint was created
        //     }

        //     event(new ComplaintSubmitted($complaint));

        //     return response()->json([
        //         'message' => 'Your complaint has been submitted successfully! You will receive an SMS notification shortly after this.'
        //     ], 200);

        // } catch (\Exception $e) {
        //     return response()->json([
        //         'message' => 'Failed to submit complaint. Please try again.',
        //         'error' => $e->getMessage()
        //     ], 500);
        // }
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $concerns = ResidentsConcerns::findOrFail($id);

        // Return user data as JSON
        return response()->json([
            'concern' => [
                'id' => $concerns->id,
                'fullname' => $concerns->fullname,
                'contact_num' => $concerns->contact_num,
                'address' => $concerns->address,
                'complaint_details' => $concerns->complaint_details,
                'dateOfIncident' => $concerns->dateOfIncident,
                'status' => $concerns->status,
                'remarks' => $concerns->remarks,
            ]
        ]);
    }

    public function finish($id)
    {
        try {
            // Find the concern by ID
            $concern = ResidentsConcerns::findOrFail($id);

            // Mark as finished
            $concern->status = 'Completed'; // Ensure the `status` column exists in the database
            $concern->save();

            // Get the resident's phone number
            $phoneNumber = $concern->contact_num; // Ensure `contact_num` exists in the database

            if (!$phoneNumber) {
                throw new \Exception('Phone number is not available.');
            }

            // Get API Key and Device ID from environment variables
            $apiKey = '60fb227e-604a-4ca9-a8a4-000febc38bae';
            $deviceId = '6732ba5a58ae3b6550860fd2';

            if (empty($apiKey) || empty($deviceId)) {
                throw new \Exception('SMS configuration is missing.');
            }

            // Send SMS confirmation
            $response = Http::withHeaders([
                'x-api-key' => $apiKey,
            ])->post("https://api.textbee.dev/api/v1/gateway/devices/{$deviceId}/send-sms", [
                'recipients' => [$phoneNumber],
                'message' => "Dear resident, we are pleased to inform you that your complaint has been resolved. Thank you!",
            ]);

            // Check if the response indicates failure
            if ($response->failed()) {
                throw new \Exception('Failed to send SMS. Response: ' . $response->body());
            }

            // Return success response
            return response()->json([
                'success' => true,
                'message' => 'Concern marked as finished and SMS sent successfully.',
                'data' => $concern,
            ]);
        } catch (\Exception $e) {
            // Log the error (optional)
            Log::error('Error finishing concern: ' . $e->getMessage());

            // Return failure response
            return response()->json([
                'success' => false,
                'message' => 'Error finishing concern: ' . $e->getMessage(),
            ], 500);
        }
    }

    public function reject(Request $request, $id)
    {
        try {
            $request->validate([
                'reason' => 'required|string|max:255',
            ]);

            // Find the concern by ID
            $concern = ResidentsConcerns::findOrFail($id);

            // Mark as rejected
            $concern->status = 'Rejected'; // Ensure the `status` column exists in the database
            $concern->remarks = $request->input('reason');
            $concern->save();

            // Get the resident's phone number
            $phoneNumber = $concern->contact_num; // Ensure `contact_num` exists in the database

            if (!$phoneNumber) {
                throw new \Exception('Phone number is not available.');
            }

            // Get API Key and Device ID from environment variables
            $apiKey = '60fb227e-604a-4ca9-a8a4-000febc38bae';
            $deviceId = '6732ba5a58ae3b6550860fd2';

            if (empty($apiKey) || empty($deviceId)) {
                throw new \Exception('SMS configuration is missing.');
            }

            $reason = $request->input('reason');

            // Send SMS confirmation
            $response = Http::withHeaders([
                'x-api-key' => $apiKey,
            ])->post("https://api.textbee.dev/api/v1/gateway/devices/{$deviceId}/send-sms", [
                'recipients' => [$phoneNumber],
                'message' => "Dear resident, we regret to inform you that your complaint has been rejected due to the following reason: $reason. If you have any questions, please reply to this number. Thank you for your understanding.",
            ]);

            // Check if the response indicates failure
            if ($response->failed()) {
                throw new \Exception('Failed to send SMS. Response: ' . $response->body());
            }

            // Return success response
            return response()->json([
                'success' => true,
                'message' => 'Concern marked as rejected and SMS sent successfully.',
                'data' => $concern,
            ]);
        } catch (\Exception $e) {
            // Log the error (optional)
            Log::error('Error rejecting concern: ' . $e->getMessage());

            // Return failure response
            return response()->json([
                'success' => false,
                'message' => 'Error rejecting concern: ' . $e->getMessage(),
            ], 500);
        }
    }
    
    public function complete($id)
    {
        try {
            // Find the concern by ID
            $concern = ResidentsConcerns::findOrFail($id);

            // Mark as completed
            $concern->status = 'Completed'; // Ensure the `status` column exists in the database
            $concern->save();

            // Get the resident's phone number
            $phoneNumber = $concern->contact_num; // Ensure `contact_num` exists in the database

            if (!$phoneNumber) {
                throw new \Exception('Phone number is not available.');
            }

            // Get API Key and Device ID from environment variables
            $apiKey = '60fb227e-604a-4ca9-a8a4-000febc38bae';
            $deviceId = '6732ba5a58ae3b6550860fd2';

            if (empty($apiKey) || empty($deviceId)) {
                throw new \Exception('SMS configuration is missing.');
            }

            // Send SMS confirmation
            $response = Http::withHeaders([
                'x-api-key' => $apiKey,
            ])->post("https://api.textbee.dev/api/v1/gateway/devices/{$deviceId}/send-sms", [
                'recipients' => [$phoneNumber],
                'message' => "Dear resident, we are pleased to inform you that your complaint has been resolved. Thank you!",
            ]);

            // Check if the response indicates failure
            if ($response->failed()) {
                throw new \Exception('Failed to send SMS. Response: ' . $response->body());
            }

            // Return success response
            return response()->json([
                'success' => true,
                'message' => 'Concern marked as completed and SMS sent successfully.',
                'data' => $concern,
            ]);
        } catch (\Exception $e) {
            // Log the error (optional)
            Log::error('Error completing concern: ' . $e->getMessage());

            // Return failure response
            return response()->json([
                'success' => false,
                'message' => 'Error completing concern: ' . $e->getMessage(),
            ], 500);
        }
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(ResidentsConcerns $residentsConcerns)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, ResidentsConcerns $residentsConcerns)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(ResidentsConcerns $residentsConcerns)
    {
        //
    }
}
