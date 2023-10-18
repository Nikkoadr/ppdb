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
        $keahlian_tkj = User::where('keahlian', 'TJKT')->count();
        $keahlian_tkro = User::where('keahlian', 'TKRO')->count();
        $keahlian_tpfl = User::where('keahlian', 'TPFL')->count();
        return view('dashboard', compact(['data_ppdb'], ['keahlian_tkj'], ['keahlian_tkro'], ['keahlian_tpfl']), ["judul" => "Dashboard"]);
    }
}
