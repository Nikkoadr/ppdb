<?php

namespace App\Http\Controllers;

use App\Models\User;

use Illuminate\Http\Request;

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
        $data_ppdb = User::all();
        return view('data_ppdb', compact(['data_ppdb']), ["judul" => "Data PPDB"]);
    }

    public function update($id, Request $request)
    {
        $user = User::find($id);
        $data_valid = $request->validate([
            'nisn'          => ['required', 'string', 'max:10'],
            'nama'          => ['required', 'string', 'max:50'],
            'sex'           => ['required', 'string', 'max:12'],
            'tempat_lahir'  => ['required', 'string', 'max:50'],
            'tanggal_lahir' => ['required', 'string', 'max:50'],
            'asal_sekolah'  => ['required', 'string', 'max:50'],
            'no_siswa'      => ['required', 'string', 'max:15'],
            'no_wali'       => ['required', 'string', 'max:15'],
            'blok'          => ['required', 'string', 'max:100'],
            'rt'            => ['required', 'integer', 'max:3'],
            'rw'            => ['required', 'integer', 'max:3'],
            'desa'          => ['required', 'string', 'max:50'],
            'kecamatan'     => ['required', 'string', 'max:50'],
            'kabupaten'     => ['required', 'string', 'max:50'],
            'keahlian'      => ['required', 'string', 'max:6'],
            'referensi'     => [],
        ]);
        $user->update($data_valid);
        return redirect('profil')->with('success', 'Perubahan Data Berhasil');
    }

    public function print()
    {
        return view('layouts.admin.partials.cetak_formulir_ppdb', ["judul" => "Cetak Formulir PPDB"]);
    }

    public function cetak()
    {
        return view('layouts.admin.partials.iframe_cetak', ["judul" => "Cetak Formulir PPDB"]);
    }

    public function destroy($id)
    {
        $ppdb = User::find($id);
        $ppdb->delete();
        return redirect('data_ppdb')->with('success', 'Data berhasil dihapus');
    }
}
