<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Maatwebsite\Excel\Facades\Excel;
use App\Exports\Data_ukuran_seragamExport;

class Data_ukuran_seragamController extends Controller
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
        $data_ukuran_seragam = DB::table('pendaftaran')
            ->leftJoin('ukuran_seragam_siswa_baru', 'pendaftaran.id', '=', 'ukuran_seragam_siswa_baru.id_pendaftaran')
            ->select('pendaftaran.nama', 'pendaftaran.no_pendaftaran', 'ukuran_seragam_siswa_baru.*')
            ->get();
        return view('admin.data_ukuran_seragam.view_data_ukuran_seragam', compact("data_ukuran_seragam"));
    }

    public function form_tambah_ukuran_seragam($code){
                $data = DB::table('pendaftaran')->where('no_pendaftaran', $code)->first();
        return view('admin.data_ukuran_seragam.form_tambah_ukuran_seragam_admin', compact('data'));
    }

    public function form_edit_ukuran_seragam($id){
        $data_ukuran_seragam = DB::table('ukuran_seragam_siswa_baru')
        ->join('pendaftaran', 'ukuran_seragam_siswa_baru.id_pendaftaran', '=', 'pendaftaran.id')
        ->select('ukuran_seragam_siswa_baru.*', 'pendaftaran.nama', 'pendaftaran.no_pendaftaran')
        ->where('ukuran_seragam_siswa_baru.id', $id)
        ->first();
        return view('admin.data_ukuran_seragam.form_edit_ukuran_seragam_admin', compact("data_ukuran_seragam"));
    }

    public function update_ukuran_seragam(Request $request, $id){
        $request->validate([
            'ukuran_baju' => 'required',
            'ukuran_celana' => 'required',
            'ukuran_sepatu' => 'required'
        ]);
        DB::table('ukuran_seragam_siswa_baru')->where('id', $id)->update([
            'ukuran_baju' => $request->ukuran_baju,
            'ukuran_celana' => $request->ukuran_celana,
            'ukuran_sepatu' => $request->ukuran_sepatu
        ]);
        return redirect('/data_ukuran_seragam')->with('success', 'Data ukuran baju, celana, dan sepatu berhasil diupdate.');
    }

    public function hapus_ukuran_seragam($id){
        DB::table('ukuran_seragam_siswa_baru')->where('id', $id)->delete();
        return redirect('/data_ukuran_seragam');
    }
    public function download(){
        $nama_file = 'data_seragam-' . date('Y-m-d') . '.xlsx';
        return Excel::download(new Data_ukuran_seragamExport, $nama_file);
    }


}
