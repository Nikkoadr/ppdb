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

// Menghitung jumlah siswa yang sudah daftar ulang per asal sekolah
$du = DB::table('users')
    ->select('asal_sekolah', DB::raw('COUNT(*) as total'))
    ->where('daftar_ulang', 'Sudah Daftar Ulang')
    ->groupBy('asal_sekolah')
    ->get();

// Menghitung jumlah siswa yang belum daftar ulang per asal sekolah
$notDu = DB::table('users')
    ->select('asal_sekolah', DB::raw('COUNT(*) as total'))
    ->where('daftar_ulang', 'Belum Daftar Ulang')
    ->groupBy('asal_sekolah')
    ->get();

// Menghitung jumlah total siswa per asal sekolah
$total = DB::table('users')
    ->select('asal_sekolah', DB::raw('COUNT(*) as total'))
    ->groupBy('asal_sekolah')
    ->get();

// Menggabungkan hasil ke dalam array
$data = [];

foreach ($total as $row) {
    $asal_sekolah = $row->asal_sekolah;
    $data[$asal_sekolah] = [
        'asal_sekolah' => $asal_sekolah,
        'total' => $row->total,
        'sudah_daftar_ulang' => 0,
        'belum_daftar_ulang' => 0,
    ];
}

foreach ($du as $row) {
    $asal_sekolah = $row->asal_sekolah;
    if (isset($data[$asal_sekolah])) {
        $data[$asal_sekolah]['sudah_daftar_ulang'] = $row->total;
    }
}

foreach ($notDu as $row) {
    $asal_sekolah = $row->asal_sekolah;
    if (isset($data[$asal_sekolah])) {
        $data[$asal_sekolah]['belum_daftar_ulang'] = $row->total;
    }
}
$jurusan_du = DB::table('users')
    ->select('keahlian', DB::raw('count(*) as total'))
    ->where('daftar_ulang', 'Sudah Daftar Ulang')
    ->groupBy('keahlian')
    ->get();

        return view('dashboard', compact(['jurusan_du'],['data'],['daftar_ulang_min1'], ['data_ppdb'], ['tkjmin1'], ['keahlian_tkro'], ['keahlian_tpfl'], ['keahlian_tei'], ['keahlian_fkk'], ['keahlian_tsm'], ['verivikasi_min1']), ["judul" => "Dashboard"]);
    
    
    }
}
