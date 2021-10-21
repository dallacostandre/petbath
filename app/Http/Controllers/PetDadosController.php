<?php

namespace App\Http\Controllers;

use App\Models\Cliente;
use App\Models\PetDados;
use App\Models\PetRaca;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PetDadosController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $unique_user_db = User::where(['id' => Auth::id()])->get('unique_user');
        $unique_user = $unique_user_db[0]->unique_user;

        $pets = PetDados::where(['unique_user' => $unique_user])->get();
        return view('lista_pets', compact('pets'));
    }

    public function cadastroPetView()
    {
        $raca_pet = PetRaca::all();
        
        $unique_user_db = User::where(['id' => Auth::id()])->get('unique_user');
        $unique_user = $unique_user_db[0]->unique_user;
        $clientes = Cliente::where(['unique_user' => $unique_user])->get();
        return view('cadastro_pet', compact('raca_pet', 'clientes'));
    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        if ($request) {
            $unique_pet = uniqid();
            $unique_user_db = User::where(['id' => Auth::id()])->get('unique_user');
            $unique_user = $unique_user_db[0]->unique_user;

            $cadastro_pet = new PetDados();
            $cadastro_pet->unique_pet = $unique_pet;
            $cadastro_pet->unique_user = $unique_user;
            $cadastro_pet->unique_cliente = $request->unique_cliente;
            $cadastro_pet->pet_nome = $request->pet_nome;
            $cadastro_pet->pet_raca = $request->pet_raca;
            $cadastro_pet->pet_porte = $request->pet_porte;
            $cadastro_pet->pet_genero = $request->pet_genero;
            $cadastro_pet->pet_especie = $request->pet_especie;
            $cadastro_pet->pet_observacoes = $request->pet_observacoes;
            $cadastro_pet->pet_castracao = $request->pet_castracao;
            $cadastro_pet->pet_pelagem = $request->pet_pelagem;
            $cadastro_pet->save();

            return response()->json([
                'message' => 'Pet cadastrado com sucesso!',
                'icon' => 'success',
                'title' => 'Pet Cadastrado',
                'url' => '/pets'
            ]);
        }
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
     * @param  \App\Models\PetDados  $petDados
     * @return \Illuminate\Http\Response
     */
    public function show(PetDados $petDados)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\PetDados  $petDados
     * @return \Illuminate\Http\Response
     */
    public function edit(PetDados $petDados)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\PetDados  $petDados
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, PetDados $petDados)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\PetDados  $petDados
     * @return \Illuminate\Http\Response
     */
    public function destroy(PetDados $petDados)
    {
        //
    }
}
