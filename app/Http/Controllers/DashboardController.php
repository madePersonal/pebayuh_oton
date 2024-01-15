<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        $data = ['page_active' => 'dashboard'];
        return view('pages.dashboard', $data);
    }
}
