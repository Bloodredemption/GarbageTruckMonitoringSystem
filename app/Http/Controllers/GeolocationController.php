<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Auth;
use App\Models\TruckLocation;
use App\Models\CollectionSchedule;
use Carbon\Carbon;

class GeolocationController extends Controller
{
    public function storeCoordinates(Request $request) {
        $apiToken = '0587137552130f'; // Replace with your ipinfo.io API token

        // Check if latitude and longitude are provided in the request
        if ($request->has(['latitude', 'longitude'])) {
            $latitude = $request->input('latitude');
            $longitude = $request->input('longitude');

            // Find the current user's active collection schedule for today
            $today = Carbon::today()->format('Y-m-d');
            $activeSchedule = CollectionSchedule::where('user_id', Auth::id())
                ->where('scheduled_date', $today)
                ->where('status', 'Ongoing') // or the appropriate status name
                ->first();

            if ($activeSchedule) {
                // Save coordinates with truck_id
                TruckLocation::create([
                    'user_id' => Auth::id(),
                    'latitude' => $latitude,
                    'longitude' => $longitude,
                    'truck_id' => $activeSchedule->dumptruck_id, // Assuming dumptruck_id is the truck ID
                ]);

                return response()->json([
                    'latitude' => $latitude,
                    'longitude' => $longitude,
                    'message' => 'Coordinates saved.'
                ]);
            } else {
                return response()->json(['error' => 'No active schedule found for today.'], 404);
            }
        } else {
            // No coordinates provided, fall back to IP-based location
            $userIP = $request->ip() === "::1" ? "8.8.8.8" : $request->ip();
            $ipinfoURL = "https://ipinfo.io/{$userIP}?token={$apiToken}";

            // Make a request to ipinfo.io API
            $ipResponse = Http::get($ipinfoURL);

            if ($ipResponse->failed()) {
                return response()->json(['error' => 'Unable to retrieve IP location data']);
            }

            // Extract IP location data
            $ipData = $ipResponse->json();
            return response()->json([
                'ip' => $ipData['ip'] ?? 'N/A',
                'city' => $ipData['city'] ?? 'N/A',
                'region' => $ipData['region'] ?? 'N/A',
                'country' => $ipData['country'] ?? 'N/A',
                'location' => $ipData['loc'] ?? 'N/A',
            ]);
        }
    }
}
