<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    public function index()
    {
        if(Auth::user()->hasRole('Admin'))
        {
            return view('dashboard.Admindashboard');
        }
        elseif (Auth::user()->hasRole('Office-Admin'))
        {
            return view('dashboard.Office-Admindashboard');
        }
        elseif (Auth::user()->hasRole('Worker'))
        {
            return view('dashboard.Workerdashboard');
        }
        elseif (Auth::user()->hasRole('User'))
        {
            return view('dashboard.Userdashboard');
        }
    }
}
