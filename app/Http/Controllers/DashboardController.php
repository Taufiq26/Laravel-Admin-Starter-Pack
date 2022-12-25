<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DashboardController extends Controller
{
    // Web function
    public function __Construct() {
        $this->menu= "Dashboard";
    }
    
    public function index(Request $request) 
    {
        return view('admin.dashboard.default');
    }
}
