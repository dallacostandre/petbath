<?php

namespace App\Http\Controllers;

use App\Models\ContasPagar;
use Illuminate\Http\Request;

class ContasPagarController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $titulo = 'Contas a Pagar';
        return view('dashboard.financeiro.contaspagar.index', compact('titulo'));
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
     * @param  \App\Models\ContasPagar  $contasPagar
     * @return \Illuminate\Http\Response
     */
    public function show(ContasPagar $contasPagar)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\ContasPagar  $contasPagar
     * @return \Illuminate\Http\Response
     */
    public function edit(ContasPagar $contasPagar)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\ContasPagar  $contasPagar
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, ContasPagar $contasPagar)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\ContasPagar  $contasPagar
     * @return \Illuminate\Http\Response
     */
    public function destroy(ContasPagar $contasPagar)
    {
        //
    }
}
