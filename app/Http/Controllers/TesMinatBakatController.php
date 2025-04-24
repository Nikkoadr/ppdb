<?php

namespace App\Http\Controllers;

use App\Models\Soal;
use App\Models\Jawaban;
use Illuminate\Http\Request;

class TesMinatBakatController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $soal = Soal::with('jawaban')->get();
        return view('tes_minat_bakat.index', compact('soal'));
    }
}
