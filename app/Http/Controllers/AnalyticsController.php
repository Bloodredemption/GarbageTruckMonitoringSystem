<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\WasteComposition;
use App\Models\WasteConversion;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class AnalyticsController extends Controller
{
    public function index()
    {
        return view('admin.analytics.index');
    }

    public function brgyWastePrediction()
    {
        // Fetch and aggregate waste data by barangay and month
        $wasteData = WasteComposition::select('brgy_id', 'waste_type', DB::raw('SUM(metrics) as total_waste'), DB::raw('YEAR(created_at) as year'), DB::raw('MONTH(created_at) as month'))
            ->groupBy('brgy_id', 'waste_type', 'year', 'month')
            ->with('brgy:id,area_name')
            ->get();

        // Calculate the average waste per month for each barangay
        $averageWasteData = $wasteData->groupBy('brgy_id')->map(function ($items, $brgyId) {
            $totalMonths = $items->groupBy('year', 'month')->count();
            $totalWaste = $items->sum('total_waste');

            return [
                'barangay' => $items->first()->brgy->area_name,
                'average_waste' => $totalWaste / $totalMonths,
                'waste' => $items->mapWithKeys(function ($item) {
                    return [$item->waste_type => $item->total_waste];
                })
            ];
        });

        // Calculate the next month for the prediction date
        $nextMonth = Carbon::now()->addMonth()->format('F Y');

        // Predict the waste for the next month based on the average
        $predictedWasteData = $averageWasteData->map(function ($data) use ($nextMonth) {
            return [
                'barangay' => $data['barangay'],
                'predicted_waste' => $data['average_waste'],
                'prediction_date' => $nextMonth,
                'waste' => $data['waste']
            ];
        });

        return response()->json($predictedWasteData->values());
    }

    public function byProductsPrediction()
    {
        // Fetch and aggregate waste conversion data by conversion method and month
        $conversionData = WasteConversion::select('conversion_method', 'metrics', 'start_date', 'end_date', DB::raw('YEAR(start_date) as year'), DB::raw('MONTH(start_date) as month'))
            ->where('start_date', '<=', Carbon::now()->endOfMonth())
            ->get();

        // Group the data by month and conversion method
        $monthlyConversionData = $conversionData->groupBy(function ($item) {
            return $item->year . '-' . str_pad($item->month, 2, '0', STR_PAD_LEFT);
        })->map(function ($items, $month) {
            return $items->groupBy('conversion_method')->map(function ($methodItems, $method) use ($month) {
                $totalMetrics = $methodItems->sum('metrics');
                return [
                    'conversion_method' => $method,
                    'month' => $month,
                    'total_metrics' => $totalMetrics
                ];
            });
        });

        // Calculate the next month for the prediction date
        $nextMonth = Carbon::now()->addMonth();
        $nextMonthFormatted = $nextMonth->format('F Y');

        // Calculate the average metrics for each conversion method
        $averageMetricsData = $conversionData->groupBy('conversion_method')->map(function ($items, $method) {
            $totalMetrics = $items->sum('metrics');
            $totalMonths = $items->groupBy(function ($item) {
                return $item->year . '-' . str_pad($item->month, 2, '0', STR_PAD_LEFT);
            })->count();

            return [
                'conversion_method' => $method,
                'average_metrics' => $totalMetrics / $totalMonths
            ];
        });

        // Predict the metrics for the next month based on the average metrics
        $predictedConversionData = $averageMetricsData->map(function ($data) use ($nextMonthFormatted) {
            return [
                'conversion_method' => $data['conversion_method'],
                'predicted_metrics' => $data['average_metrics'],
                'prediction_date' => $nextMonthFormatted
            ];
        });

        return response()->json($predictedConversionData->values());
    }

    public function wastePrediction()
    {
        // Fetch and aggregate waste data by waste type and month
        $wasteData = WasteComposition::select('waste_type', DB::raw('SUM(metrics) as total_metrics'), DB::raw('YEAR(collection_date) as year'), DB::raw('MONTH(collection_date) as month'))
            ->groupBy('waste_type', 'year', 'month')
            ->get();

        // Calculate the next month for the prediction date
        $nextMonth = Carbon::now()->addMonth();
        $nextMonthFormatted = $nextMonth->format('F Y');

        // Calculate the previous month
        $previousMonth = Carbon::now()->subMonth();
        $previousMonthYear = $previousMonth->year;
        $previousMonthNumber = $previousMonth->month;

        // Fetch the data for the previous month
        $previousMonthData = WasteComposition::select('waste_type', DB::raw('SUM(metrics) as total_metrics'))
            ->whereYear('collection_date', $previousMonthYear)
            ->whereMonth('collection_date', $previousMonthNumber)
            ->groupBy('waste_type')
            ->get();

        // Predict the metrics for the next month based on the previous month's data
        $predictedWasteData = $previousMonthData->map(function ($item) use ($nextMonthFormatted) {
            return [
                'waste_type' => $item->waste_type,
                'predicted_metrics' => $item->total_metrics,
                'prediction_date' => $nextMonthFormatted,
            ];
        });

        return response()->json($predictedWasteData->values());
    }
}
