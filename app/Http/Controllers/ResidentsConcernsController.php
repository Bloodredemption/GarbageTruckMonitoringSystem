<?php

namespace App\Http\Controllers;

use App\Models\ResidentsConcerns;
use Illuminate\Http\Request;

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
        // Validate form data
        $request->validate([
            'complaint_type' => 'required|string|max:255',
            'fullname' => 'required|string|max:255',
            'contact_num' => 'required|string|max:15',
            'brgy_location' => 'required|string|max:255',
            'complaint_subject' => 'required|string|max:255',
            'complaint_details' => 'required|string',
            'dateOfIncident' => 'required|date',
        ]);

        try {
            // Create a new complaint record
            ResidentsConcerns::create([
                'complaint_type' => $request->complaint_type,
                'fullname' => $request->fullname,
                'contact_num' => $request->contact_num,
                'brgy_location' => $request->brgy_location,
                'complaint_subject' => $request->complaint_subject,
                'complaint_details' => $request->complaint_details,
                'dateOfIncident' => $request->dateOfIncident,
            ]);

            // Return a JSON response on success
            return response()->json([
                'message' => 'Your complaint has been submitted successfully!'
            ], 200);

        } catch (\Exception $e) {
            // Return an error response if something goes wrong
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
