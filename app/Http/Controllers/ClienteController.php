<?php

namespace App\Http\Controllers;

use App\Models\Cliente;
use App\Models\ClienteEndereco;
use App\Models\PetDados;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ClienteController extends Controller
{

    public function __construct()
    {
        function clean($string)
        {
            $string = str_replace(' ', '', $string); // Replaces all spaces with hyphens.
            return preg_replace('/[^A-Za-z0-9\-]/', '', $string); // Removes special chars.
        }
    }

    public function create(Request $request)
    {
        $unique_endereco = uniqid();
        $unique_cliente = uniqid();
        $unique_user_db = User::where(['id' => Auth::id()])->get('unique_user');
        $unique_user = $unique_user_db[0]->unique_user;
        $email = $request->email;
        $telefone_view = $request->telefone;
        $whatsapp_view = $request->whatsapp;

        $whatsapp_str = clean($whatsapp_view);
        $telefone_str = clean($telefone_view);
        $whatsapp = str_replace('-', '', $whatsapp_str);
        $telefone = str_replace('-', '', $telefone_str);

        // VALIDAR SE HÁ EMAIL E NÚMERO CADASTRADO ANTES DE QUALQUER COISA -<<<
        $email_usado = Cliente::where(['cliente_email' => $email])->get();
        $telefone_usado = Cliente::where(['cliente_telefone' => $telefone])->get();


        if (count($email_usado) >= 1) {
            return response()->json([
                'message' => 'Email já cadastrado',
                'title' => 'Este email já esta cadastrado no sistema.',
                'icon' => 'warning'
            ]);
            exit();
        } else {
            if (count($telefone_usado) >= 1) {
                return response()->json([
                    'message' => 'Telefone já cadastrado',
                    'title' => 'Este telefone já esta cadastrado no sistema! Tente outro.',
                    'icon' => 'warning'
                ]);
                exit();
            }
            $novo_cliente = new Cliente;
            $novo_cliente->unique_user = $unique_user;
            $novo_cliente->unique_cliente = $unique_cliente;
            $novo_cliente->cliente_nome = $request->nome;
            /* $novo_cliente->cliente_sobrenome = $request->sobrenome; */
            $novo_cliente->cliente_email = $email;
            $novo_cliente->cliente_telefone = $telefone;
            $novo_cliente->cliente_whatsapp = $whatsapp;
            $novo_cliente->unique_endereco = $unique_endereco;
            $novo_cliente->save();

            $endereco = new ClienteEndereco;
            $endereco->unique_endereco = $unique_endereco;
            $endereco->cliente_rua = $request->rua;
            $endereco->cliente_bairro  = $request->bairro;
            $endereco->cliente_complemento = $request->complemento;
            $endereco->cliente_numero = $request->numero;
            $endereco->cliente_cep = $request->cep;
            $endereco->cliente_estado = $request->uf;
            $endereco->cliente_cidade = $request->cidade;
            $endereco->save();

            return response()->json([
                'message' => 'Novo cliente foi cadastrado com sucesso.',
                'icon' => 'success',
                'title' => 'Cadastrado com sucesso.',
                'url' => '/clientes'
            ]);
        }
    }

    public function index()
    {

        $unique_user_db = User::where(['id' => Auth::id()])->get('unique_user');
        $unique_user = $unique_user_db[0]->unique_user;

        $clientes_cadastrados = Cliente::where(['unique_user' => $unique_user])->get();

        return view(
            'lista_clientes',
            compact('clientes_cadastrados')
        );
    }

    public function cadastroView()
    {
        return view('cadastro_cliente');
    }

    public function editarView($id)
    {
        $cliente = Cliente::find($id)->get();
        $unique_endereco = Cliente::where(['unique_endereco' => $cliente[0]->unique_endereco])->get();
        $endereco = ClienteEndereco::where(['unique_endereco' => $unique_endereco[0]->unique_endereco])->get();
        $titulo = 'Editando: ' . $cliente[0]->cliente_nome;

        return view('cadastro_cliente', compact(
            'cliente',
            'endereco',
            'titulo'
        ));
    }

    public function destroy($id)
    {
        if ($id) {
            $cliente = Cliente::find($id)->get();
            $unique = Cliente::where(['unique_endereco' => $cliente[0]->unique_endereco])->get();
            $unique_endereco = $unique[0]->unique_endereco;
            $endereco = ClienteEndereco::where(['unique_endereco' => $unique_endereco])->get();
            $id_endereco = $endereco[0]->id;
            Cliente::destroy($id);
            ClienteEndereco::destroy($id_endereco);

            return back()->with(['success' => 'Cliente removido com sucesso']);
        } else {
            return back()->with(['success' => 'Não foi possível excluir']);
        }
    }

    public function historicoCliente($id)
    {
        return view('historico');
    }

    public function update(Request $request)
    {

        $email = $request->email;
        $id = $request->id_cliente;
        $telefone_view = $request->telefone;
        $whatsapp_view = $request->whatsapp;

        $whatsapp_str = clean($whatsapp_view);
        $telefone_str = clean($telefone_view);
        $whatsapp = str_replace('-', '', $whatsapp_str);
        $telefone = str_replace('-', '', $telefone_str);

        $atualizar_cliente = Cliente::find($id);
        $atualizar_cliente->cliente_nome = $request->nome;
        /* $atualizar_cliente->cliente_sobrenome = $request->sobrenome; */
        $atualizar_cliente->cliente_email = $email;
        $atualizar_cliente->cliente_telefone = $telefone;
        $atualizar_cliente->cliente_whatsapp = $whatsapp;
        $atualizar_cliente->save();

        $cliente = Cliente::find($id)->get();
        $unique = Cliente::where(['unique_endereco' => $cliente[0]->unique_endereco])->get();
        $unique_endereco = $unique[0]->unique_endereco;

        $endereco = ClienteEndereco::where(['unique_endereco' => $unique_endereco])->first();
        $endereco->cliente_rua = $request->rua;
        $endereco->cliente_bairro  = $request->bairro;
        $endereco->cliente_complemento = $request->complemento;
        $endereco->cliente_numero = $request->numero;
        $endereco->cliente_cep = $request->cep;
        $endereco->cliente_estado = $request->uf;
        $endereco->cliente_cidade = $request->cidade;
        $endereco->save();

        return response()->json([
            'message' => 'Cliente foi atualizado com sucesso.',
            'icon' => 'success',
            'title' => 'Cliente atualizado com sucesso.',
            'url' => '/clientes'
        ]);
    }

    public function visualizarCliente($id)
    {
        $cliente = Cliente::find($id);
        $endereco = ClienteEndereco::where(['unique_endereco' => $cliente->unique_endereco])->get();
        $pets = PetDados::where(['unique_cliente' => $cliente->unique_cliente])->get();

        return view('visualizar_dados_cliente', compact('cliente', 'endereco', 'pets'));
    }
}
