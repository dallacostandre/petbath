<?php

namespace App\Http\Controllers;

use App\Models\Cliente;
use App\Models\ClienteEndereco;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ClienteController extends Controller
{
    public function create(Request $request)
    {

        $unique_endereco = uniqid();
        $unique_user_db = User::where(['id' => Auth::id()])->get('unique_user');
        $unique_user = $unique_user_db[0]->unique_user;
        $nome_completo = $request->nome . ' ' . $request->sobrenome;
        $email = $request->email;
        $telefone = $request->telefone;
        $whatsapp = $request->whatsapp;

        // VALIDAR SE HÁ EMAIL OU NÚMERO CADASTRADO ANTES DE QUALQUER COISA -<<<

        $novo_cliente = new Cliente;
        $novo_cliente->unique_user = $unique_user;
        $novo_cliente->cliente_nome = $nome_completo;
        $novo_cliente->cliente_email = $email;
        $novo_cliente->cliente_telefone = $telefone;
        $novo_cliente->cliente_whatsapp = $whatsapp;
        $novo_cliente->unique_endereco = $unique_endereco;
        $novo_cliente->save();

        $endereco = new ClienteEndereco;
        $endereco->unique_endereco = $unique_endereco;
        $endereco->user_rua = $request->rua;
        $endereco->user_bairro  = $request->bairro;
        $endereco->user_complemento = $request->complemento;
        $endereco->user_numero = $request->numero;
        $endereco->user_cep = $request->cep;
        $endereco->user_estado = $request->uf;
        $endereco->user_cidade = $request->cidade;
        $endereco->save();

        return response()->json([
            'message' => 'Abigail',
            'icon' => 'success',
            'title' => 'Cadastrado com sucesso.',
            'url' => '/clientes'
        ]);
    }
}
