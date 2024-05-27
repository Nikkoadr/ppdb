<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class Data_ppdbController extends Controller
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
        $this->authorize('isadmin');
        $data_ppdb = User::latest()->get();
        return view('data_ppdb', compact(['data_ppdb']), ["judul" => "Data PPDB"]);
    }
    public function edit_data_siswa($id)
    {
        $this->authorize('isadmin');
        $user = User::find($id);
        return view('edit_data_siswa', compact(['user']), ["judul" => "Edit Data Siswa Baru"]);
    }

    public function update_data_ppdb_admin($id, Request $request)
    {
        $data_valid = $request->validate([
            'role'                              => ['required'],
            'verifikasi'                        => ['required'],
            'daftar_ulang'                      => ['required'],
            'status_mpls'                       => ['required'],
            'email'                             => ['required', 'email', 'string'],
            'nisn'                              => [],
            'no_kk'                             => [],
            'no_nik'                            => [],
            'nama'                              => ['required', 'string', 'max:255'],
            'sex'                               => [],
            'tempat_lahir'                      => [],
            'tanggal_lahir'                     => [],
            'asal_sekolah'                      => ['required', 'string', 'max:255'],
            'nama_ayah'                         => [],
            'pekerjaan_ayah'                    => [],
            'nama_ibu'                          => [],
            'pekerjaan_ibu'                     => [],
            'status_orang_tua'                  => [],
            'blok'                              => [],
            'rt'                                => [],
            'rw'                                => [],
            'desa'                              => [],
            'kecamatan'                         => [],
            'kabupaten'                         => [],
            'no_siswa'                          => [],
            'no_wali'                           => [],
            'panjang_baju'                      => [],
            'lingkar_dada'                      => [],
            'panjang_lengan_pendek'             => [],
            'panjang_lengan_panjang'            => [],
            'panjang_celana_rok'                => [],
            'lingkar_panggul'                   => [],
            'lebar_panggul'                     => [],
            'ukuran_sepatu'                     => [],
            'keahlian'                          => [],
            'referensi'                         => [],
        ]);
        $user = User::find($id);
        $user->update($data_valid);
        return redirect('data_ppdb')->with('success', 'Data Berhasil di Update');
    }

    public function ubah_password_siswa($id, Request $request)
    {
        $data_valid = $request->validate([
            'password'      => ['required', 'confirmed'],
        ]);

        $hash = Hash::make($data_valid['password']);
        $user = User::find($id);
        $user->update(['password' => $hash]);
        return redirect('data_ppdb')->with('success', 'Password Berhasil diganti');
    }

    public function print($id)
    {
        $user = User::find($id);
        return view('layouts.admin.component.cetak_formulir_ppdb_via_admin', compact(['user']), ["judul" => "Cetak Formulir PPDB"]);
    }

    public function destroy($id)
    {
        $ppdb = User::find($id);
        $ppdb->delete();
        return redirect('data_ppdb')->with('success', 'Data berhasil dihapus');
    }
}
