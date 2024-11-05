<?php

namespace App\Http\Controllers;
use App\Models\Pendaftaran;

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
        $jumlah_pendaftaran = Pendaftaran::count();
        $las = Pendaftaran::where('id_konsentrasi_keahlian', '1')->count();
        $tei = Pendaftaran::where('id_konsentrasi_keahlian', '2')->count();
        $tkr = Pendaftaran::where('id_konsentrasi_keahlian', '3')->count();
        $tkj = Pendaftaran::where('id_konsentrasi_keahlian', '4')->count();
        $tsm = Pendaftaran::where('id_konsentrasi_keahlian', '5')->count();
        $fkk = Pendaftaran::where('id_konsentrasi_keahlian', '6')->count();
        $jumlah_daftar_ulang = Pendaftaran::where('id_status_siswa', '3')->count();
        return view('dashboard', compact('jumlah_pendaftaran','las', 'tei', 'tkr', 'tkj', 'tsm', 'fkk','jumlah_daftar_ulang'));
    }
}
