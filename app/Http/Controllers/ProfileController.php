<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ProfileController extends Controller
{
    public function index()
    {
        return view('driver.account.index');
    }

    public function change_pass()
    {
        return view('driver.change-password.index');
    }

    public function personalinfo()
    {
        return view('driver.personal-information.index');
    }

    public function personalinfoedit()
    {
        return view('driver.personal-information.edit');
    }

    public function help()
    {
        return view('driver.help.index');
    }
}
