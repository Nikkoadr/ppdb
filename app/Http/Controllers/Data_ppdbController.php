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
        $data_ppdb = User::all();
        return view('data_ppdb', compact(['data_ppdb']), ["judul" => "Data PPDB"]);
    }

    public function update($id, Request $request)
    {
        $user = User::find($id);
        $data_valid = $request->validate([
            'nisn'          => ['required', 'string', 'max:20'],
            'nama'          => ['required', 'string', 'max:255'],
            'sex'           => ['required', 'string', 'max:255'],
            'tempat_lahir'  => ['required', 'string', 'max:255'],
            'tanggal_lahir' => ['required', 'string', 'max:255'],
            'asal_sekolah'  => ['required', 'string', 'max:255'],
            'no_siswa'      => ['required', 'string', 'max:255'],
            'no_wali'       => ['required', 'string', 'max:255'],
            'alamat'        => ['required', 'string', 'max:255'],
            'keahlian'      => ['required', 'string', 'max:255'],
            'referensi'     => ['string', 'max:255'],
        ]);
        $user->update($data_valid);
        return redirect('profil')->with('success', 'Data berhasil diedit');
    }
}
