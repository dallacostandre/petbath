<?php

namespace App\Http\Controllers;

use App\Models\Notificacoes;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class NotificacoesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
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
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        if ($request) {
            // BUSCA O UNIQUE ID DO USUÁRIO
            $unique_user = Auth::user()->unique_user;

            // ADICIONAR AS NOTIFICAÇÕES
            $notificacoes = new Notificacoes();
            $notificacoes->notificacao_data = $request->dataNotificacao;
            $notificacoes->notificacao_descricao = $request->descricaoNotificacao;
            $notificacoes->unique_user = $unique_user;
            $notificacoes->unique_cliente = $request->uniqueIdCliente;
            $notificacoes->save();

            return response()->json([
                'message' => 'Notificação adicionada com sucesso',
                'title' => 'Adicionado',
                'icon' => 'success',
            ]);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Notificacoes  $notificacoes
     * @return \Illuminate\Http\Response
     */
    public function show(Notificacoes $notificacoes)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Notificacoes  $notificacoes
     * @return \Illuminate\Http\Response
     */
    public function edit(Notificacoes $notificacoes)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\  $request
     * @param  \App\Models\Notificacoes  $notificacoes
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Notificacoes $notificacoes)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Notificacoes  $notificacoes
     * @return \Illuminate\Http\Response
     */
    public function destroy(Notificacoes $notificacoes)
    {
        //
    }
}
