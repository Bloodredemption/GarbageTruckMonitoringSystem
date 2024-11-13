<?php

namespace App\Http\Controllers;

use App\Events\ComplaintSubmitted;
use App\Models\ResidentsConcerns;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

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
        $concerns = ResidentsConcerns::orderBy('created_at', 'desc')->get();

        return view('admin.residents-concerns.index', compact('concerns'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'complaint_type' => 'required|string|max:255',
            'fullname' => 'required|string|max:255',
            'contact_num' => 'required|string|max:15',
            'brgy_location' => 'required|string|max:255',
            'complaint_details' => 'required|string',
            'dateOfIncident' => 'required|date',
            'attachments.*' => 'image|mimes:jpeg,png,jpg,gif|max:2048', // File validation
        ]);

        try {
            $attachments = [];
            
            // Retrieve renamed filenames from the form data
            if ($request->has('renamed_filenames')) {
                $renamedFilenames = json_decode($request->input('renamed_filenames'), true);

                if ($request->hasFile('attachments')) {
                    foreach ($request->file('attachments') as $index => $file) {
                        // Store the file in the 'public/uploads' directory with its renamed filename
                        $path = $file->storeAs('uploads', $renamedFilenames[$index], 'public');
                        $attachments[] = $path; // Save the path to the attachments array
                    }
                }
            }

            // Save complaint with the list of attachment paths as an array in the attachments column
            $complaint = ResidentsConcerns::create([
                'complaint_type' => $request->complaint_type,
                'fullname' => $request->fullname,
                'contact_num' => $request->contact_num,
                'brgy_location' => $request->brgy_location,
                'complaint_details' => $request->complaint_details,
                'dateOfIncident' => $request->dateOfIncident,
                'attachments' => $attachments, // Store as array (casting in model will handle JSON encoding)
            ]);

            // Send SMS notification using the new API
            $response = Http::withHeaders([
                'x-api-key' => '60fb227e-604a-4ca9-a8a4-000febc38bae', // Your API Key
            ])->post('https://api.textbee.dev/api/v1/gateway/devices/6732ba5a58ae3b6550860fd2/sendSMS', [
                'recipients' => [$complaint->contact_num],
                'message' => "Hello {$complaint->fullname}, the system has received your complaint. Rest assured, MENRO Balingasag will take best measures to comply with your complaint. Thank you!\n\n(This is a system-generated message. Please do not reply.)"
            ]);

            // Check for SMS API response success
            if ($response->failed()) {
                return response()->json([
                    'message' => 'Complaint submitted, but failed to send SMS notification.',
                    'sms_error' => $response->body()
                ], 200); // Respond with 200 to indicate the complaint was created
            }

            event(new ComplaintSubmitted($complaint));

            return response()->json([
                'message' => 'Your complaint has been submitted successfully! You will receive an SMS notification shortly after this.'
            ], 200);

        } catch (\Exception $e) {
            return response()->json([
                'message' => 'Failed to submit complaint. Please try again.',
                'error' => $e->getMessage()
            ], 500);
        }
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
                'fullname' => $concerns->fullname,
                'complaint_type' => $concerns->complaint_type,
                'contact_num' => $concerns->contact_num,
                'brgy_location' => $concerns->brgy_location,
                'complaint_subject' => $concerns->complaint_subject,
                'complaint_details' => $concerns->complaint_details,
                'dateOfIncident' => $concerns->dateOfIncident,
                'attachments' => $concerns->attachments,
            ]
        ]);
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
