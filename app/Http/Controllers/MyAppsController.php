<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class MyAppsController extends Controller
{
    public function myapps()
    {
        
        return "Home page here";
    }

    public function getstarted()
    {
        return view('pages.getstarted');
    }
}
