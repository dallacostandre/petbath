<?php

namespace App\Http\Controllers;

use App\Models\Cliente;
use App\Models\PetDados;
use App\Models\PetRaca;
use App\Models\User;
use Facade\FlareClient\Http\Client;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PetDadosController extends Controller
{
    /**
     * Display a listing of the resource.
     * Ultima Alteração: 30-04-22
     * @return \Illuminate\Http\Response
     */
    public function index($uniqueIdCliente)
    {
        $uniqueCliente = $uniqueIdCliente;
        $objCliente = Cliente::where(['unique_cliente' => $uniqueCliente])->first('cliente_nome');
        $objPets = PetDados::where(['unique_cliente' => $uniqueIdCliente])->paginate(10);
        $raca_pet = PetRaca::all();

        return view('dashboard.lista_pets', compact('objPets', 'raca_pet', 'uniqueCliente', 'objCliente'));
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
    }

    /**
     * Store a newly created resource in storage.
     *  Ultima Alteração: 29-04-22
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        if ($request) {
            $unique_pet = uniqid();
            $unique_user_db = User::where(['id' => Auth::id()])->get();

            $cadastro_pet = new PetDados();
            $cadastro_pet->unique_pet = $unique_pet;
            $cadastro_pet->unique_user = $unique_user_db[0]->unique_user;
            $cadastro_pet->unique_cliente = $request->uniqueIdCliente;
            $cadastro_pet->pet_nome = $request->pet_nome;
            $cadastro_pet->pet_raca = $request->pet_raca;
            $cadastro_pet->pet_porte = $request->pet_porte;
            $cadastro_pet->pet_genero = $request->pet_genero;
            $cadastro_pet->pet_especie = $request->pet_especie;
            $cadastro_pet->pet_observacoes = $request->pet_observacoes;
            $cadastro_pet->pet_pelagem = $request->pet_pelagem;
            $cadastro_pet->save();

            return response()->json([
                'title' => 'Pet Cadastrado',
                'message' => 'Pet cadastrado com sucesso!',
                'icon' => 'success',
            ]);
        }
    }

    /**
     * Display the specified resource.
     * Ultima Alteração: 29-04-22
     * @param  \App\Models\PetDados  $petDados
     * @return \Illuminate\Http\Response
     */
    public function show(PetDados $petDados, Request $request)
    {
        if ($request->ajax()) {
            $dados = PetDados::where(['id' => $request->id])->get();
            $dadosPet = [
                'unique_pet' => $dados[0]->unique_pet,
                'pet_id' => $dados[0]->id,
                'pet_nome' => $dados[0]->pet_nome,
                'pet_raca' => $dados[0]->pet_raca,
                'pet_porte' => $dados[0]->pet_porte,
                'pet_genero' => $dados[0]->pet_genero,
                'pet_especie' => $dados[0]->pet_especie,
                'pet_observacoes' => $dados[0]->pet_observacoes,
                'pet_pelagem' => $dados[0]->pet_pelagem,
            ];

            return response()->json([
                'dados' => $dadosPet,
            ]);
        } else {
            return response()->json([
                'message' => 'Houve um erro.',
                'icon' => 'error',
                'title' => 'Erro',
            ]);
        }
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
     * Ultima Alteração: 29-04-22
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\PetDados  $petDados
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, PetDados $petDados)
    {
        if ($request) {
            $cadastro_pet = PetDados::find($request->id_pet);
            $cadastro_pet->pet_nome = $request->pet_nome;
            $cadastro_pet->pet_raca = $request->pet_raca;
            $cadastro_pet->pet_porte = $request->pet_porte;
            $cadastro_pet->pet_genero = $request->pet_genero;
            $cadastro_pet->pet_especie = $request->pet_especie;
            $cadastro_pet->pet_observacoes = $request->pet_observacoes;
            $cadastro_pet->pet_pelagem = $request->pet_pelagem;
            $cadastro_pet->update();

            return response()->json([
                'title' => 'Pet foi atualizado com sucesso.',
                'message' => 'Pet atualizado com sucesso!',
                'icon' => 'success',
            ]);
        } else {
            return response()->json([
                'message' => 'Pet não foi atualizado',
                'icon' => 'erro',
                'title' => 'Houve um erro.',
            ]);
        }
    }

    /**
     * Remove the specified resource from storage.
     * Ultima Alteração: 29-04-22
     * @param  \App\Models\PetDados  $petDados
     * @return \Illuminate\Http\Response
     */
    public function destroy(PetDados $petDados, Request $request)
    {
        // VALIDAR SE EXISTE ALGUM AGENDAMENTO COM ESTE PET E VOLTAR UMA INFORMAÇÃO
        if ($request->ajax()) {
            PetDados::destroy($request->id);
            return response()->json([
                'message' => 'Pet excluído com sucesso!',
                'icon' => 'success',
                'title' => 'Pet Excluído',
            ]);
        } else {
            return response()->json([
                'message' => 'Houve um erro.',
                'icon' => 'error',
                'title' => 'Erro',
            ]);
        }
    }
}
