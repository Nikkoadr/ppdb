<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Pendaftar;

class Data_pendaftarController extends Controller
{
    public function index()
    {
        $data_pendaftar = Pendaftar::all();
        return view('admin.data_pendaftar', compact("data_pendaftar"), ["judul" => "Data Pendaftar"]);
    }
}
