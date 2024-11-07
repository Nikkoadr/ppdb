<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class Data_priodeController extends Controller
{
    public function index()
    {
        $data_periode = DB::table('periode')
        ->orderBy('created_at', 'asc')
        ->get();
        return view('admin\data_periode\view_data_periode', compact('data_periode'));
    }
    public function form_tambah_periode()
        {
            return view('admin.data_periode.form_tambah_periode_admin');
        }

    public function proses_tambah_periode(Request $request)
        {
            $request->validate([
                'tahun_ajaran' => 'required',
                'periode_aktif' => 'required',
            ]);

            DB::table('periode')->insert([
                'tahun_ajaran' => $request->tahun_ajaran,
                'periode_aktif' => $request->periode_aktif,
            ]);
            return redirect('/data_priode')->with('success', 'Data periode berhasil ditambahkan.');
        }

    public function view_edit_periode(Request $request, $id)
        {

        }   
    public function update_periode($id)
        {

        }
        public function hapus_periode($id)
        {
            DB::table('periode')->where('id', $id)->delete();
            return redirect()->back();
        }
}
