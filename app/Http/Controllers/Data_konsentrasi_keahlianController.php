<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class Data_konsentrasi_keahlianController extends Controller
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
        $data_konsentrasi_keahlian = DB::table('konsentrasi_keahlian')->get();
        return view('admin.data_konsentrasi_keahlian.view_data_konsentrasi_keahlian', compact('data_konsentrasi_keahlian'));
    }

    public function form_tambah_konsentrasi_keahlian(){
        return view('admin.data_konsentrasi_keahlian.form_tambah_konsentrasi_keahlian_admin');
    }

    public function proses_tambah_konsentrasi_keahlian(Request $request){
        $request->validate([
            'nama_konsentrasi_keahlian' => 'required',
        ]);
        DB::table('konsentrasi_keahlian')->insert([
            'nama_konsentrasi_keahlian' => $request->nama_konsentrasi_keahlian,
            'created_at' => date('Y-m-d H:i:s')
        ]);
        return redirect('/data_konsentrasi_keahlian')->with('success', 'Data Berhasil Ditambahkan');
    }

    public function form_edit_konsentrasi_keahlian($id){
        $data = DB::table('konsentrasi_keahlian')->where('id', $id)->first();
        return view('admin.data_konsentrasi_keahlian.form_edit_konsentrasi_keahlian_admin', compact('data'));
    }

    public function update_konsentrasi_keahlian(Request $request,$id){
        $request->validate([
            'nama_konsentrasi_keahlian' => 'required',
        ]);
        DB::table('konsentrasi_keahlian')->where('id', $id)->update([
            'nama_konsentrasi_keahlian' => $request->nama_konsentrasi_keahlian,
            'updated_at' => date('Y-m-d H:i:s')
        ]);
        return redirect('/data_konsentrasi_keahlian')->with('success', 'Data Berhasil Diupdate');
    }

    public function hapus_konsentrasi_keahlian($id){
        DB::table('konsentrasi_keahlian')->where('id', $id)->delete();
        return redirect('/data_konsentrasi_keahlian')->with('success', 'Data Berhasil Dihapus');
    }
}
