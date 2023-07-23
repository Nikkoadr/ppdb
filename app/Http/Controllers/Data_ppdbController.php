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
        $data_ppdb = User::latest()->paginate(100);
        return view('data_ppdb', compact(['data_ppdb']), ["judul" => "Data PPDB"]);
    }

    public function update_data_ppdb_admin($id, Request $request)
    {
        $data_valid = $request->validate([
            'role'          => ['required'],
            'verifikasi'    => ['required'],
            'daftar_ulang'  => ['required'],
            'status_mpls'   => ['required'],
            'email'         => ['required', 'email', 'string'],
            'nisn'          => ['required', 'string', 'max:10'],
            'nama'          => ['required', 'string', 'max:50'],
            'sex'           => ['required', 'string', 'max:12'],
            'tempat_lahir'  => ['required', 'string', 'max:50'],
            'tanggal_lahir' => ['required', 'string', 'max:50'],
            'asal_sekolah'  => ['required', 'string', 'max:50'],
            'no_siswa'      => ['required', 'string', 'max:15'],
            'no_wali'       => ['required', 'string', 'max:15'],
            'blok'          => ['required', 'string', 'max:100'],
            'rt'            => ['required', 'string', 'max:3'],
            'rw'            => ['required', 'string', 'max:3'],
            'desa'          => ['required', 'string', 'max:50'],
            'kecamatan'     => ['required', 'string', 'max:50'],
            'kabupaten'     => ['required', 'string', 'max:50'],
            'keahlian'      => ['required', 'string', 'max:50'],
            'referensi'     => [],
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

    public function destroy($id)
    {
        $ppdb = User::find($id);
        $ppdb->delete();
        return redirect('data_ppdb')->with('success', 'Data berhasil dihapus');
    }
}
