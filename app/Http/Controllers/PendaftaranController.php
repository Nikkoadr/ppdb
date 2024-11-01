<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PendaftaranController extends Controller
{
    public function form_pendaftaran(){
        $periode = DB::table('periode')->orderBy('created_at', 'desc')->first();
        $jenis_kelamin = DB::table('jenis_kelamin')->get();
        $asal_sekolah = DB::table('asal_sekolah')->get();
        $status_orang_tua = DB::table('status_orang_tua')->get();
        $konsentrasi_keahlian = DB::table('konsentrasi_keahlian')->get();

        return view('pendaftaran.form_pendaftaran', compact('jenis_kelamin', 'asal_sekolah', 'status_orang_tua', 'konsentrasi_keahlian', 'periode'));
    }

public function proses_pendaftaran(Request $request)
{
    // Validasi data
    $request->validate([
        'nisn' => 'nullable',
        'no_kk' => 'nullable',
        'no_nik' => 'nullable',
        'nama' => 'required|string|max:100',
        'id_jenis_kelamin' => 'required|integer|exists:jenis_kelamin,id',
        'tempat_lahir' => 'required|string|max:50',
        'tanggal_lahir' => 'required|date|before:today',
        'id_asal_sekolah' => 'required|integer|exists:asal_sekolah,id',
        'nama_ayah' => 'nullable|string|max:100',
        'pekerjaan_ayah' => 'nullable|string|max:100',
        'nama_ibu' => 'nullable|string|max:100',
        'pekerjaan_ibu' => 'nullable|string|max:100',
        'id_status_orang_tua' => 'nullable|integer|exists:status_orang_tua,id',
        'no_siswa' => 'required|string|max:20',
        'no_wali_siswa' => 'nullable|string|max:20',
        'blok' => 'nullable|string|max:20',
        'rt' => 'nullable|numeric',
        'rw' => 'nullable|numeric',
        'desa' => 'nullable|string|max:100',
        'kecamatan' => 'nullable|string|max:100',
        'kabupaten' => 'nullable|string|max:100',
        'id_konsentrasi_keahlian' => 'required|integer|exists:konsentrasi_keahlian,id',
        'referensi' => 'nullable|string|max:255',
    ]);

    // Insert data ke tabel pendaftaran
    $pendaftaranId = DB::table('pendaftar')->insertGetId([
        'nisn' => $request->nisn,
        'no_kk' => $request->no_kk,
        'no_nik' => $request->no_nik,
        'nama' => $request->nama,
        'id_jenis_kelamin' => $request->id_jenis_kelamin,
        'tempat_lahir' => $request->tempat_lahir,
        'tanggal_lahir' => $request->tanggal_lahir,
        'id_asal_sekolah' => $request->id_asal_sekolah,
        'nama_ayah' => $request->nama_ayah,
        'pekerjaan_ayah' => $request->pekerjaan_ayah,
        'nama_ibu' => $request->nama_ibu,
        'pekerjaan_ibu' => $request->pekerjaan_ibu,
        'id_status_orang_tua' => $request->status_orang_tua,
        'no_siswa' => $request->no_siswa,
        'no_wali_siswa' => $request->no_wali,
        'blok' => $request->blok,
        'rt' => $request->rt,
        'rw' => $request->rw,
        'desa' => $request->desa,
        'kecamatan' => $request->kecamatan,
        'kabupaten' => $request->kabupaten,
        'id_konsentrasi_keahlian' => $request->keahlian,
        'referensi' => $request->referensi,
        'created_at' => now(),
        'updated_at' => now(),
    ]);
    dd($pendaftaranId);

    // Redirect ke view print dengan data pendaftaran yang baru saja disimpan
    return redirect()->route('pendaftaran.print', ['id' => $pendaftaranId])
                        ->with('success', 'Data berhasil ditambahkan');
}

}
