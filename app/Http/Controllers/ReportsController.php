<?php

namespace App\Http\Controllers;

use App\Models\WasteComposition;
use App\Models\WasteConversion;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ReportsController extends Controller
{
    public function wasteCollected()
    {
        $currentDate = now()->toDateString();

        $wasteData = \App\Models\WasteComposition::selectRaw('
                barangays.area_name,
                SUM(CASE WHEN waste_type = "Biodegradable" THEN metrics ELSE 0 END) as biodegradable,
                SUM(CASE WHEN waste_type = "Residual" THEN metrics ELSE 0 END) as residual,
                SUM(metrics) as total
            ')
            ->join('barangays', 'barangays.id', '=', 'waste_compositions.brgy_id')
            ->whereDate('waste_compositions.collection_date', '=', $currentDate)
            ->groupBy('barangays.area_name')
            ->get();

        return view('admin.reports.waste-collected', compact('wasteData'));
    }

    public function fetchWasteCollectedData(Request $request)
    {
        // Get the selected timeframe from the request, defaulting to 'day'
        $timeframe = $request->get('timeframe', 'day'); // Default to 'day' if no timeframe is selected

        // Get the current date and time for the end date
        $endDate = now();

        // Determine the start date based on the selected timeframe
        switch ($timeframe) {
            case 'week':
                $startDate = $endDate->copy()->startOfWeek(); // Get the start of the current week
                $endDate = $endDate->copy()->endOfWeek(); // Get the end of the current week
                break;
            case 'month':
                $startDate = $endDate->copy()->startOfMonth(); // Get the start of the current month
                $endDate = $endDate->copy()->endOfMonth(); // Get the end of the current month
                break;
            case 'year':
                $startDate = $endDate->copy()->startOfYear(); // Get the start of the current year
                $endDate = $endDate->copy()->endOfYear(); // Get the end of the current year
                break;
            default: // Default to 'day' timeframe
                $startDate = $endDate->copy()->startOfDay(); // Get the start of the current day
                $endDate = $endDate->copy()->endOfDay(); // Get the end of the current day
                break;
        }

        // Fetch the data from the WasteComposition model
        $wasteData = \App\Models\WasteComposition::selectRaw('
                barangays.area_name,
                SUM(CASE WHEN waste_type = "Biodegradable" THEN metrics ELSE 0 END) as biodegradable,
                SUM(CASE WHEN waste_type = "Residual" THEN metrics ELSE 0 END) as residual,
                SUM(metrics) as total
            ')
            ->join('barangays', 'barangays.id', '=', 'waste_compositions.brgy_id')
            ->whereBetween(DB::raw('DATE(collection_date)'), [$startDate->format('Y-m-d'), $endDate->format('Y-m-d')])
            ->groupBy('barangays.area_name')
            ->get();

        // Return the data as JSON
        return response()->json($wasteData);
    }

    public function wasteConverted() 
    {
        $currentDate = Carbon::now()->format('Y-m-d');

        $wasteData = WasteConversion::select('conversion_method', 'waste_type', 'total_converted')
            ->selectRaw('SUM(metrics) as metrics_sum')
            ->selectRaw('DATE_FORMAT(MIN(start_date), "%M %d, %Y") as start_date')
            ->selectRaw('DATE_FORMAT(MAX(end_date), "%M %d, %Y") as end_date')
            ->where('status', 'Finished')
            ->whereDate('start_date', '<=', $currentDate)
            ->whereDate('end_date', '>=', $currentDate)
            ->groupBy('conversion_method', 'waste_type', 'total_converted')
            ->get();

        return view('admin.reports.waste-converted', compact('wasteData'));
    }

    public function getWasteDataByTimeframe(Request $request)
    {
        $timeframe = $request->input('timeframe', 'day'); // Default to 'day'
        $currentDate = Carbon::now();

        // Variables to hold start and end dates for the query
        $start = $currentDate;
        $end = $currentDate;

        // Adjust the timeframe based on the selected option
        switch ($timeframe) {
            case 'week':
                $start = Carbon::now()->startOfWeek();
                $end = Carbon::now()->endOfWeek();
                break;
            case 'month':
                $start = Carbon::now()->startOfMonth();
                $end = Carbon::now()->endOfMonth();
                break;
            case 'year':
                $start = Carbon::now()->startOfYear();
                $end = Carbon::now()->endOfYear();
                break;
            default:
                // Default is 'day'
                $start = $currentDate;
                $end = $currentDate;
                break;
        }

        // Query WasteConversion model based on the selected timeframe
        $wasteData = WasteConversion::select('conversion_method', 'waste_type', 'total_converted')
            ->selectRaw('SUM(metrics) as metrics_sum')
            ->selectRaw('DATE_FORMAT(MIN(start_date), "%M %d, %Y") as start_date')
            ->selectRaw('DATE_FORMAT(MAX(end_date), "%M %d, %Y") as end_date')
            ->where('status', 'Finished')
            ->whereDate('start_date', '<=', $end) // Ensure that we are getting relevant data based on the timeframe
            ->whereDate('end_date', '>=', $start)
            ->groupBy('conversion_method', 'waste_type', 'total_converted')
            ->get();

        return response()->json($wasteData);
    }
}
