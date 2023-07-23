<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class DashboardController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $query = User::count();
        $admin = 1;
        $data_ppdb = $query - $admin;
        return view('dashboard', compact(['data_ppdb']), ["judul" => "Dashboard"]);
    }
    
}
