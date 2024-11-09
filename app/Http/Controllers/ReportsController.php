<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ReportsController extends Controller
{
    public function wasteCollected()
    {
        return view('admin.reports.waste-collected');
    }

    public function wasteConverted() 
    {
        return view('admin.reports.waste-converted');
    }
}
