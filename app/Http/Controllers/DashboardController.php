<?php

namespace App\Http\Controllers;

use App\Models\Pendaftaran;
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
        $pendaftaran = DB::table('pendaftaran')
            ->join('asal_sekolah', 'pendaftaran.id_asal_sekolah', '=', 'asal_sekolah.id')
            ->select(
                'asal_sekolah.nama_asal_sekolah as nama_asal_sekolah',
                DB::raw('COUNT(CASE WHEN pendaftaran.id_status_siswa = 1 THEN 1 END) as tidak_terverifikasi'),
                DB::raw('COUNT(CASE WHEN pendaftaran.id_status_siswa = 2 THEN 1 END) as sudah_terverifikasi'),
                DB::raw('COUNT(CASE WHEN pendaftaran.id_status_siswa = 3 THEN 1 END) as sudah_daftar_ulang'),
                DB::raw('COUNT(*) as total_pendaftaran_by_sekolah')
            )
            ->groupBy('asal_sekolah.nama_asal_sekolah')
            ->get();

        $jumlah_pendaftaran = Pendaftaran::count();

        // Jumlah total per jurusan
        $las = Pendaftaran::where('id_konsentrasi_keahlian', '1')->count();
        $tei = Pendaftaran::where('id_konsentrasi_keahlian', '2')->count();
        $tkr = Pendaftaran::where('id_konsentrasi_keahlian', '3')->count();
        $tkj = Pendaftaran::where('id_konsentrasi_keahlian', '4')->count();
        $tsm = Pendaftaran::where('id_konsentrasi_keahlian', '5')->count();
        $fkk = Pendaftaran::where('id_konsentrasi_keahlian', '6')->count();

        // Jumlah daftar ulang per jurusan
        $las_daftar_ulang = Pendaftaran::where('id_konsentrasi_keahlian', '1')->where('id_status_siswa', '3')->count();
        $tei_daftar_ulang = Pendaftaran::where('id_konsentrasi_keahlian', '2')->where('id_status_siswa', '3')->count();
        $tkr_daftar_ulang = Pendaftaran::where('id_konsentrasi_keahlian', '3')->where('id_status_siswa', '3')->count();
        $tkj_daftar_ulang = Pendaftaran::where('id_konsentrasi_keahlian', '4')->where('id_status_siswa', '3')->count();
        $tsm_daftar_ulang = Pendaftaran::where('id_konsentrasi_keahlian', '5')->where('id_status_siswa', '3')->count();
        $fkk_daftar_ulang = Pendaftaran::where('id_konsentrasi_keahlian', '6')->where('id_status_siswa', '3')->count();

        $jumlah_daftar_ulang = Pendaftaran::where('id_status_siswa', '3')->count();

        return view('dashboard', compact(
            'jumlah_pendaftaran',
            'las',
            'tei',
            'tkr',
            'tkj',
            'tsm',
            'fkk',
            'las_daftar_ulang',
            'tei_daftar_ulang',
            'tkr_daftar_ulang',
            'tkj_daftar_ulang',
            'tsm_daftar_ulang',
            'fkk_daftar_ulang',
            'jumlah_daftar_ulang',
            'pendaftaran'
        ));
    }
}
