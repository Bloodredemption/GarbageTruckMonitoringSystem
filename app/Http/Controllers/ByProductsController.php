<?php

namespace App\Http\Controllers;

use App\Models\ByProducts;
use App\Models\WasteConversion;
use Illuminate\Http\Request;
use Carbon\Carbon;

class ByProductsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // Fetch the rows with the Finished status and get the specified columns
        $byProducts = WasteConversion::where('status', 'Finished')
                        ->select('conversion_method', 'metrics', 'start_date', 'end_date')
                        ->get();

        // Format the dates into human-readable format
        $byProducts->each(function ($byProduct) {
            $byProduct->start_date = Carbon::parse($byProduct->start_date)->format('F j, Y');
            $byProduct->end_date = Carbon::parse($byProduct->end_date)->format('F j, Y');
        });

        return view('landfill.by-products.index', compact('byProducts'));
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
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(ByProducts $byProducts)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(ByProducts $byProducts)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, ByProducts $byProducts)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(ByProducts $byProducts)
    {
        //
    }
}
