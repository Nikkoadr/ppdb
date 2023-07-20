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
        $data_ppdb = User::count();
        return view('dashboard', compact(['data_ppdb']), ["judul" => "Dashboard"]);
    }
    public function profile()
    {
        return view('profile', ["judul" => "Profile"]);
    }
}
