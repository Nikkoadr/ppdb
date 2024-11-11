<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;


class Data_asal_sekolahController extends Controller
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

    public function index(){
        $data_asal_sekolah = DB::table('asal_sekolah')
        ->leftJoin('jenis_asal_sekolah', 'asal_sekolah.id_jenis_asal_sekolah', '=', 'jenis_asal_sekolah.id')
        ->leftJoin('status_asal_sekolah', 'asal_sekolah.id_status_asal_sekolah', '=', 'status_asal_sekolah.id')
        ->select('asal_sekolah.*', 'jenis_asal_sekolah.nama_jenis_asal_sekolah', 'status_asal_sekolah.nama_status_asal_sekolah')
        ->get();
        return view('admin.data_asal_sekolah.view_data_asal_sekolah', compact('data_asal_sekolah'));
    }
    public function form_tambah_asal_sekolah(){
        $jenis_asal_sekolah = DB::table('jenis_asal_sekolah')->get();
        $status_asal_sekolah = DB::table('status_asal_sekolah')->get();
        return view('admin.data_asal_sekolah.form_tambah_asal_sekolah_admin', compact('jenis_asal_sekolah', 'status_asal_sekolah'));
    }

    public function proses_tambah_asal_sekolah(Request $request){
        $request->validate([
            'id_jenis_asal_sekolah' => 'required',
            'id_status_asal_sekolah' => 'required',
            'nama_asal_sekolah' => 'required',
        ]);
        DB::table('asal_sekolah')->insert([
            'npsn' => $request->npsn,
            'id_jenis_asal_sekolah' => $request->id_jenis_asal_sekolah,
            'id_status_asal_sekolah' => $request->id_status_asal_sekolah,
            'nama_asal_sekolah' => $request->nama_asal_sekolah,
            'kecamatan' => $request->kecamatan,
            'kabupaten' => $request->kabupaten,
            'provinsi' => $request->provinsi,
        ]);
        return redirect('data_asal_sekolah')->with(['success' => 'Data asal sekolah berhasil ditambahkan !']);
    }

    public function form_edit_asal_sekolah($id){
        $data_asal_sekolah = DB::table('asal_sekolah')->where('id', $id)->first();
        $jenis_asal_sekolah = DB::table('jenis_asal_sekolah')->get();
        $status_asal_sekolah = DB::table('status_asal_sekolah')->get();
        return view('admin.data_asal_sekolah.form_edit_asal_sekolah_admin', compact('data_asal_sekolah', 'jenis_asal_sekolah', 'status_asal_sekolah'));
    }

    public function update_asal_sekolah(Request $request, $id){
        $request->validate([
            'id_jenis_asal_sekolah' => 'required',
            'id_status_asal_sekolah' => 'required',
            'nama_asal_sekolah' => 'required',
        ]);
        DB::table('asal_sekolah')->where('id', $id)->update([
            'npsn' => $request->npsn,
            'id_jenis_asal_sekolah' => $request->id_jenis_asal_sekolah,
            'id_status_asal_sekolah' => $request->id_status_asal_sekolah,
            'nama_asal_sekolah' => $request->nama_asal_sekolah,
            'kecamatan' => $request->kecamatan,
            'kabupaten' => $request->kabupaten,
            'provinsi' => $request->provinsi,
        ]);
        return redirect('data_asal_sekolah')->with(['success' => 'Data asal sekolah berhasil diupdate !']);
    }

    public function hapus_asal_sekolah($id){
        DB::table('asal_sekolah')->where('id', $id)->delete();
        return redirect('data_asal_sekolah')->with(['success' => 'Data asal sekolah berhasil dihapus !']);
    }
}
