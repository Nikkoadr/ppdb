<?php

namespace App\Http\Controllers;

use App\Models\Pendaftaran;
use Illuminate\Support\Facades\DB;

class Data_pendaftaranController extends Controller
{
    public function index()
    {
        $pendaftaran = DB::table('pendaftaran')
            ->join('asal_sekolah', 'pendaftaran.id_asal_sekolah', '=', 'asal_sekolah.id')
            ->join('konsentrasi_keahlian', 'pendaftaran.id_konsentrasi_keahlian', '=', 'konsentrasi_keahlian.id')
            ->join('status_orang_tua', 'pendaftaran.id_status_orang_tua', '=', 'status_orang_tua.id')
            ->join('jenis_kelamin', 'pendaftaran.id_jenis_kelamin', '=', 'jenis_kelamin.id')
            ->join('status_siswa', 'pendaftaran.id_status_siswa', '=', 'status_siswa.id')
            ->select(
                'pendaftaran.*', 
                'asal_sekolah.nama_asal_sekolah', 
                'konsentrasi_keahlian.nama_konsentrasi_keahlian',
                'status_orang_tua.nama_status_orang_tua', 
                'jenis_kelamin.nama_jenis_kelamin',
                'status_siswa.nama_status_siswa'
            )
            ->orderBy('created_at', 'desc')
            ->get();
        return view('admin.data_pendaftaran', compact("pendaftaran"), ["judul" => "Data Pendaftaran"]);
    }
}
