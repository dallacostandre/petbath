<?php

namespace App\Http\Controllers;

use App\Models\Demonstrativo;
use Illuminate\Http\Request;

class DemonstrativoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $titulo = 'DRE - Demonstrativo Financeiro';
        return view('dashboard.financeiro.demonstrativo.index', compact('titulo'));
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
     * @param  \App\Models\Demonstrativo  $demonstrativo
     * @return \Illuminate\Http\Response
     */
    public function show(Demonstrativo $demonstrativo)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Demonstrativo  $demonstrativo
     * @return \Illuminate\Http\Response
     */
    public function edit(Demonstrativo $demonstrativo)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Demonstrativo  $demonstrativo
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Demonstrativo $demonstrativo)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Demonstrativo  $demonstrativo
     * @return \Illuminate\Http\Response
     */
    public function destroy(Demonstrativo $demonstrativo)
    {
        //
    }
}
