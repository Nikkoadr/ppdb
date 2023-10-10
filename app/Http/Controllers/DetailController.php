<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DetailController extends Controller
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

    public function profile()
    {
        return view('profile', ["judul" => "Profile"]);
    }

    public function update_profile($id, Request $request)
    {
        $data_valid = $request->validate([
            'nisn'              => ['required', 'string', 'max:10'],
            'no_kk'             => [],
            'no_nik'            => [],
            'nama'              => ['required', 'string', 'max:255'],
            'sex'               => ['required', 'string', 'max:255'],
            'tempat_lahir'      => ['required', 'string', 'max:255'],
            'tanggal_lahir'     => ['required', 'date'],
            'asal_sekolah'      => ['required', 'string', 'max:255'],
            'nama_ayah'         => ['required', 'string', 'max:255'],
            'pekerjaan_ayah'    => [],
            'nama_ibu'          => ['required', 'string', 'max:255'],
            'pekerjaan_ibu'     => [],
            'status_orang_tua'  => ['required'],
            'blok'              => ['required', 'string', 'max:100'],
            'rt'                => ['required', 'string', 'max:3'],
            'rw'                => ['required', 'string', 'max:3'],
            'desa'              => ['required', 'string', 'max:50'],
            'kecamatan'         => ['required', 'string', 'max:50'],
            'kabupaten'         => ['required', 'string', 'max:50'],
            'no_siswa'          => ['required', 'string', 'max:15'],
            'no_wali'           => ['required', 'string', 'max:15'],
            'keahlian'          => ['required', 'string', 'max:50'],
            'referensi'         => [],
        ]);
        $user = User::find($id);
        $user->update($data_valid);
        return redirect('profile')->with('success', 'Data Berhasil di Update');
    }

    public function update_baju($id, Request $request)
    {
        $data_valid = $request->validate([
            'panjang_baju'                      => ['nullable', 'integer', 'max:80', 'min:50'],
            'lingkar_dada'                      => ['nullable', 'integer', 'max:130', 'min:1000'],
            'lebar_punggung'                    => ['nullable', 'integer', 'max:55', 'min:40'],
            'panjang_lengan_pendek'            => ['nullable', 'integer', 'max:30', 'min:20'],
            'panjang_lengan_panjang'            => ['nullable', 'integer', 'max:65', 'min:55'],

        ]);
        $user = User::find($id);
        $user->update($data_valid);
        return redirect('profile')->with('success', 'Data Baju Berhasil di Tambahkan');
    }

    public function upload_pasfoto_siswa($id, Request $request)
    {
        $request->validate([
            'pasfoto' => 'required|image|mimes:jpeg,png,jpg,gif|file|max:5120',
        ]);
        $imageName = 'pasfoto' . '_' . Auth::user()->id . '_' . Auth::user()->nama . '_' . \Carbon\Carbon::parse(Auth::user()->tanggal_lahir)->translatedFormat('d-F-Y') . '_' . rand(0, 99999) . '.' . $request->pasfoto->getClientOriginalExtension();
        $request->pasfoto->storeAs('public/dokumen-ppdb', $imageName);
        $user = User::find($id);
        $user->update(['pasfoto' => $imageName]);
        return redirect('profile')->with('success', 'Pas Foto Berhasil Diupload');
    }

    public function upload_kk_siswa($id, Request $request)
    {
        $request->validate([
            'kk' => 'required|image|mimes:jpeg,png,jpg,gif|file|max:5120',
        ]);
        $imageName = 'kk' . '_' . Auth::user()->id . '_' . Auth::user()->nama . '_' . \Carbon\Carbon::parse(Auth::user()->tanggal_lahir)->translatedFormat('d-F-Y') . '_' . rand(0, 99999) . '.' . $request->kk->getClientOriginalExtension();
        $request->kk->storeAs('public/dokumen-ppdb', $imageName);
        $user = User::find($id);
        $user->update(['kk' => $imageName]);
        return redirect('profile')->with('success', 'KK Berhasil Diupload');
    }

    public function upload_akta_siswa($id, Request $request)
    {
        $request->validate([
            'akta' => 'required|image|mimes:jpeg,png,jpg,gif|file|max:5120',
        ]);
        $imageName = 'akta' . '_' . Auth::user()->id . '_' . Auth::user()->nama . '_' . \Carbon\Carbon::parse(Auth::user()->tanggal_lahir)->translatedFormat('d-F-Y') . '_' . rand(0, 99999) . '.' . $request->akta->getClientOriginalExtension();
        $request->akta->storeAs('public/dokumen-ppdb', $imageName);
        $user = User::find($id);
        $user->update(['akta' => $imageName]);
        return redirect('profile')->with('success', 'AKTA Berhasil Diupload');
    }

    public function upload_ijazah_siswa($id, Request $request)
    {
        $request->validate([
            'ijazah' => 'required|image|mimes:jpeg,png,jpg,gif|file|max:5120',
        ]);
        $imageName = 'ijazah' . '_' . Auth::user()->id . '_' . Auth::user()->nama . '_' . \Carbon\Carbon::parse(Auth::user()->tanggal_lahir)->translatedFormat('d-F-Y') . '_' . rand(0, 99999) . '.' . $request->ijazah->getClientOriginalExtension();
        $request->ijazah->storeAs('public/dokumen-ppdb', $imageName);
        $user = User::find($id);
        $user->update(['ijazah' => $imageName]);
        return redirect('profile')->with('success', 'Ijazah Berhasil Diupload');
    }

    public function print()
    {
        return view('layouts.admin.component.cetak_formulir_ppdb', ["judul" => "Cetak Formulir PPDB"]);
    }
}
