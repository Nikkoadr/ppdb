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
}
