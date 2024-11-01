<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Asal_sekolah;

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

    public function getAsalSekolah(Request $request)
        {
            $search = $request->query('query'); // Mendapatkan input pencarian dari query string
            $sekolah = Asal_sekolah::where('nama_asal_sekolah', 'like', '%' . $search . '%')->get(); // Ambil data sekolah sesuai input pencarian
            
            return response()->json($sekolah); // Kembalikan hasil dalam format JSON
        }

public function proses_pendaftaran(Request $request)
{
    $cek_data = DB::table('pendaftar')
        ->where('nama', $request->nama)
        ->where('tanggal_lahir', $request->tanggal_lahir)
        ->first();

    if ($cek_data) {
        return redirect()->back()->with(['error' => 'Data dengan nama dan tanggal lahir yang sama sudah ada dalam database kami !']);
    }

    $request->validate([
        'nisn' => 'nullable',
        'no_kk' => 'nullable',
        'no_nik' => 'nullable',
        'nama' => 'required|string|max:100',
        'id_jenis_kelamin' => 'required|integer|exists:jenis_kelamin,id',
        'tempat_lahir' => 'required|string|max:50',
        'tanggal_lahir' => 'required|date|before:today',
        'id_asal_sekolah' => 'nullable|integer|exists:asal_sekolah,id',
        'nama_asal_sekolah' => 'required|string|max:100',
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

    $idAsalSekolah = $request->input('id_asal_sekolah');

    if (!$idAsalSekolah) {
        $idAsalSekolah = DB::table('asal_sekolah')->insertGetId([
            'nama_asal_sekolah' => $request->input('nama_asal_sekolah'),
            'created_at' => now(),
            'updated_at' => now(),
        ]);
    }

    $pendaftaranId = DB::table('pendaftar')->insertGetId([
        'id_status_siswa' => 1,
        'nisn' => $request->nisn,
        'no_kk' => $request->no_kk,
        'no_nik' => $request->no_nik,
        'nama' => $request->nama,
        'id_jenis_kelamin' => $request->id_jenis_kelamin,
        'tempat_lahir' => $request->tempat_lahir,
        'tanggal_lahir' => $request->tanggal_lahir,
        'id_asal_sekolah' => $idAsalSekolah,
        'nama_ayah' => $request->nama_ayah,
        'pekerjaan_ayah' => $request->pekerjaan_ayah,
        'nama_ibu' => $request->nama_ibu,
        'pekerjaan_ibu' => $request->pekerjaan_ibu,
        'id_status_orang_tua' => $request->id_status_orang_tua,
        'no_siswa' => $request->no_siswa,
        'no_wali_siswa' => $request->no_wali_siswa,
        'blok' => $request->blok,
        'rt' => $request->rt,
        'rw' => $request->rw,
        'desa' => $request->desa,
        'kecamatan' => $request->kecamatan,
        'kabupaten' => $request->kabupaten,
        'id_konsentrasi_keahlian' => $request->id_konsentrasi_keahlian,
        'referensi' => $request->referensi,
        'created_at' => now(),
        'updated_at' => now(),
    ]);

    return redirect()   ->route('pendaftaran.print', ['id' => $pendaftaranId])
                        ->with('success', 'Data berhasil ditambahkan');
}


}
