<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ReportsController extends Controller
{
    public function index()
    {
        return view('admin.reports.index');
    }

    public function daily()
    {
        return view('admin.reports.daily.index');
    }

    public function quarterly()
    {
        return view('admin.reports.quarterly.index');
    }

    public function yearly()
    {
        return view('admin.reports.yearly.index');
    }
}
