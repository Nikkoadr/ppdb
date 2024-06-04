<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\DB;

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
        $tkjmin1 = $keahlian_tkj - $admin;
        $keahlian_tkro = User::where('keahlian', 'TKRO')->count();
        $keahlian_tpfl = User::where('keahlian', 'TPFL')->count();
        $keahlian_tei = User::where('keahlian', 'TE')->count();
        $keahlian_fkk = User::where('keahlian', 'TF')->count();
        $keahlian_tsm = User::where('keahlian', 'TBSM')->count();
        $daftar_ulang = User::where('daftar_ulang', 'Sudah Daftar Ulang')->count();
        $verifikasi = User::where('verifikasi', 'Verified')->count();
        $daftar_ulang_min1 = $daftar_ulang - $admin;
        $verivikasi_min1 = $verifikasi - $admin;
        $du = DB::table('users')
            ->select('asal_sekolah', DB::raw('COUNT(*) as total'))
            ->where('daftar_ulang', 'Sudah Daftar Ulang')
            ->groupBy('asal_sekolah')
            ->get();
        return view('dashboard', compact(['du'],['daftar_ulang_min1'], ['data_ppdb'], ['tkjmin1'], ['keahlian_tkro'], ['keahlian_tpfl'], ['keahlian_tei'], ['keahlian_fkk'], ['keahlian_tsm'], ['verivikasi_min1']), ["judul" => "Dashboard"]);
    }
}
