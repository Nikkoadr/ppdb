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

    public function update_data_ppdb_admin($id, Request $request)
    {
        $data_valid = $request->validate([
            'role'                              => ['required'],
            'verifikasi'                        => ['required'],
            'daftar_ulang'                      => ['required'],
            'status_mpls'                       => ['required'],
            'email'                             => ['required', 'email', 'string'],
            'nisn'                              => ['required', 'string', 'max:10'],
            'no_kk'                             => [],
            'no_nik'                            => ['required', 'min:16'],
            'nama'                              => ['required', 'string', 'max:255'],
            'sex'                               => ['required', 'string', 'max:255'],
            'tempat_lahir'                      => ['required', 'string', 'max:255'],
            'tanggal_lahir'                     => ['required', 'date', 'after_or_equal:2006-01-01', 'before_or_equal:2011-12-31'],
            'asal_sekolah'                      => ['required', 'string', 'max:255'],
            'nama_ayah'                         => ['required', 'string', 'max:255'],
            'pekerjaan_ayah'                    => [],
            'nama_ibu'                          => ['required', 'string', 'max:255'],
            'pekerjaan_ibu'                     => [],
            'status_orang_tua'                  => ['required'],
            'blok'                              => ['required', 'string', 'max:100'],
            'rt'                                => ['required', 'string', 'max:3'],
            'rw'                                => ['required', 'string', 'max:3'],
            'desa'                              => ['required', 'string', 'max:50'],
            'kecamatan'                         => ['required', 'string', 'max:50'],
            'kabupaten'                         => ['required', 'string', 'max:50'],
            'no_siswa'                          => ['required', 'string', 'max:15'],
            'no_wali'                           => ['required', 'string', 'max:15'],
            'panjang_baju'                      => ['nullable', 'integer', 'max:80', 'min:50'],
            'lingkar_dada'                      => ['nullable', 'integer', 'max:130', 'min:100'],
            'panjang_lengan_pendek'             => ['nullable', 'integer', 'max:30', 'min:20'],
            'panjang_lengan_panjang'            => ['nullable', 'integer', 'max:65', 'min:55'],
            'panjang_celana_rok'                => ['nullable', 'integer'],
            'lingkar_panggul'                   => ['nullable', 'integer'],
            'lebar_panggul'                     => ['nullable', 'integer'],
            'ukuran_sepatu'                     => ['nullable', 'integer', 'max:50', 'min:30'],
            'keahlian'                          => ['required', 'string', 'max:50'],
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
