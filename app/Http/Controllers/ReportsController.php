<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ReportsController extends Controller
{
    public function wcoldaily()
    {
        return view('admin.reports.waste-collected.daily.index');
    }

    public function wcolweekly()
    {
        return view('admin.reports.waste-collected.weekly.index');
    }

    public function wcolmonthly()
    {
        return view('admin.reports.waste-collected.monthly.index');
    }

    public function wcolyearly()
    {
        return view('admin.reports.waste-collected.yearly.index');
    }
}
