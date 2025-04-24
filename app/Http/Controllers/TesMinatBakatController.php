<?php

namespace App\Http\Controllers;

use App\Models\TesMinatBakat;
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
        return view('tes_minat_bakat.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\TesMinatBakat  $tesMinatBakat
     * @return \Illuminate\Http\Response
     */
    public function show(TesMinatBakat $tesMinatBakat)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\TesMinatBakat  $tesMinatBakat
     * @return \Illuminate\Http\Response
     */
    public function edit(TesMinatBakat $tesMinatBakat)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\TesMinatBakat  $tesMinatBakat
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, TesMinatBakat $tesMinatBakat)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\TesMinatBakat  $tesMinatBakat
     * @return \Illuminate\Http\Response
     */
    public function destroy(TesMinatBakat $tesMinatBakat)
    {
        //
    }
}
