<?php

namespace App\Http\Controllers;

use App\Http\Requests\CadastroClienteRequest;
use App\Models\Cliente;
use App\Models\ClienteEndereco;
use App\Models\PetDados;
use App\Models\PetRaca;
use App\Models\User;
use Facade\FlareClient\Http\Client;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Str;

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

    /*
        Descricao: Funcao que adiciona o cliente
        Data: 07/01/2022
        Status: Funcionando
    */
    public function store(Request $request)
    {
        $unique_user = Auth::user()->unique_user; // Busca o codigo do Usuário
        $unique_endereco = uniqid(); // Cria um codigo único para o Endereço do Cliente
        $unique_cliente = uniqid(); // Cria um codigo único para o Cliente

        $telefone_str = clean($request->cliente_telefone);
        $telefone = str_replace('-', '', $telefone_str);

        if ($request->cliente_whatsapp != null) {
            $whatsapp_str = clean($request->cliente_whatsapp);
            $whatsapp = str_replace('-', '', $whatsapp_str);
        } else {
            $whatsapp = $request->cliente_whatsapp;
        }


        // VALIDAR SE HÁ EMAIL E NÚMERO CADASTRADO ANTES DE CADASTRAR -<<<
        $email_usado = Cliente::where(['cliente_email' => $request->cliente_email])->get();
        $telefone_usado = Cliente::where(['cliente_telefone' => $request->cliente_telefone])->get();

        if (count($email_usado) >= 1) {
            return response()->json([
                'title' => 'Atenção',
                'message' => 'Email já cadastrado',
                'icon' => 'warning',
            ]);
            exit();
        } elseif (count($telefone_usado) >= 1) {
            return response()->json([
                'title' => 'Atenção',
                'message' => 'Telefone já cadastrado',
                'icon' => 'warning',
            ]);
        } else {
            $cliente = new Cliente();
            $cliente->unique_user = $unique_user;
            $cliente->unique_endereco = $unique_endereco;
            $cliente->unique_cliente = $unique_cliente;
            $cliente->cliente_nome = strtolower($request->cliente_nome);
            $cliente->cliente_email = $request->cliente_email;
            $cliente->cliente_telefone = $telefone;
            $cliente->cliente_whatsapp = $whatsapp;
            $cliente->cliente_instagram = str_replace(' ', '', $request->cliente_instagram);
            $cliente->save();

            //Pegar o Unique ID do Cliente
            $cliente->id;
            $objClientCadastrado = Cliente::where(['id' =>  $cliente->id])->get();

            $endereco_cliente = new ClienteEndereco();
            $endereco_cliente->unique_endereco = $unique_endereco;
            $endereco_cliente->cliente_rua = $request->cliente_rua;
            $endereco_cliente->cliente_numero = $request->cliente_numero;
            $endereco_cliente->cliente_bairro = $request->cliente_bairro;
            $endereco_cliente->cliente_complemento = $request->cliente_complemento;
            $endereco_cliente->cliente_cep = $request->cliente_cep;
            $endereco_cliente->cliente_estado = $request->cliente_estado;
            $endereco_cliente->cliente_cidade = $request->cliente_cidade;
            $endereco_cliente->save();

            return response()->json([
                'title' => 'Cadastro realizado',
                'message' => 'Cliente cadastrado com sucesso!',
                'icon' => 'success',
                'url' => '/pets/' . $objClientCadastrado[0]->unique_cliente,
            ]);
        }
    }

    /*
        Descricao: Funcao que retorna todos os clientes cadastrados do usuário logado
        Data: 07/01/2022
        Status: Funcionando
    */
    public function index()
    {
        $unique_user_db = User::where(['id' => Auth::id()])->get('unique_user');
        $unique_user = $unique_user_db[0]->unique_user;
        $clientes_cadastrados = Cliente::orderBy('id', 'DESC')->where(['unique_user' => $unique_user])->paginate(10);

        return view(
            'dashboard.clientes',
            compact('clientes_cadastrados')
        );
    }

    /*
        Descricao: Funcao que retorna a view de cadastro do cliente
        Data: 07/01/2022
        Status: Funcionando
    */
    public function create()
    {
        $raca_pet  = PetRaca::all();
        return view('dashboard.cliente_cadastro', compact('raca_pet'));
    }

    /*
        Descrição: Função que retorna a view de editar com os dados do cliente.
        Status: Funcionado
        Data: 06/01/2022
    */
    public function edit($id)
    {
        $objCliente = Cliente::find($id);
        $uniqueEnderecoObject = Cliente::where(['unique_endereco' => $objCliente->unique_endereco])->get();
        $uniqueEndereco = $uniqueEnderecoObject[0]->unique_endereco;
        $endereco = ClienteEndereco::where(['unique_endereco' => $uniqueEndereco])->first();
        $titulo = 'Editando: ' . $objCliente->cliente_nome;
        $raca_pet  = PetRaca::all();

        return view('dashboard.cliente_cadastro', compact(
            'objCliente',
            'endereco',
            'titulo',
            'raca_pet'
        ));
    }

    /*
        Descrição: Função que atualiza os dados do cliente.
        Status: Funcionado
        Data: 06/01/2022
    */
    public function update(Request $request)
    {
        if ($request) {
            $whatsapp_str = clean($request->cliente_whatsapp);
            $telefone_str = clean($request->cliente_telefone);
            $telefone = str_replace('-', '', $telefone_str);

            if ($request->cliente_whatsapp != null) {
                $whatsapp_str = clean($request->cliente_whatsapp);
                $whatsapp = str_replace('-', '', $whatsapp_str);
            } else {
                $whatsapp = $request->cliente_whatsapp;
            }

            // VALIDAR SE HÁ EMAIL E NÚMERO CADASTRADO ANTES DE CADASTRAR -<<<
            // $email_usado = Cliente::where(['cliente_email' => $request->cliente_email])->get();
            // $telefone_usado = Cliente::where(['cliente_telefone' => $request->cliente_telefone])->get();

            // if (count($email_usado) >= 1) {
            //     return response()->json([
            //         'title' => 'Atenção',
            //         'message' => 'Email já cadastrado',
            //         'icon' => 'warning',
            //     ]);
            //     exit();
            // } elseif (count($telefone_usado) >= 1) {
            //     return response()->json([
            //         'title' => 'Atenção',
            //         'message' => 'Telefone já cadastrado',
            //         'icon' => 'warning',
            //     ]);
            // } else {
            $cliente = Cliente::find($request->id);
            $cliente->cliente_nome = strtolower($request->cliente_nome);
            $cliente->cliente_email = $request->cliente_email;
            $cliente->cliente_telefone = $telefone;
            $cliente->cliente_whatsapp = $whatsapp;
            $cliente->cliente_instagram = str_replace(' ', '', $request->cliente_instagram);
            $cliente->save();

            //Pegar o Unique ID do Cliente
            $objEndereco = ClienteEndereco::where(['unique_endereco' => $cliente->unique_endereco])->first();

            $objEnderecoNovo = ClienteEndereco::find($objEndereco->id);
            $objEnderecoNovo->cliente_rua = $request->cliente_rua;
            $objEnderecoNovo->cliente_numero = $request->cliente_numero;
            $objEnderecoNovo->cliente_bairro = $request->cliente_bairro;
            $objEnderecoNovo->cliente_complemento = $request->cliente_complemento;
            $objEnderecoNovo->cliente_cep = $request->cliente_cep;
            $objEnderecoNovo->cliente_estado = $request->cliente_estado;
            $objEnderecoNovo->cliente_cidade = $request->cliente_cidade;
            $objEnderecoNovo->update();

            return response()->json([
                'title' => 'Atualizado',
                'message' => 'Cliente atualizado com sucesso',
                'icon' => 'success',
                'url' => '/clientes'
            ]);
        } else {
            return response()->json([
                'title' => 'Atenção',
                'message' => 'Não foi possível atualizar o cliente',
                'icon' => 'warning',
            ]);
        }
    }

    public function destroy(Request $request)
    {
        if ($request->id) {
            // ENCONTRA O CLIENTE
            $cliente = Cliente::find($request->id);
            // EXLUIR ENDEREÇO
            Cliente::where(['unique_endereco' => $cliente->unique_endereco])->delete();
            // EXCLUIR PETS
            PetDados::where(['unique_cliente' => $cliente->unique_cliente])->delete();
            // EXCLUIR CLIENTE
            Cliente::destroy($request->id);

            // TO DO: VALIDAR SE HÁ AGENDAMENTOS EXISTENTES

            return response()->json([
                'title' => 'Excluído',
                'message' => 'Dados do cliente foram removidos com sucesso.',
                'icon' => 'success',
            ]);
        } else {
            return response()->json([
                'title' => 'Erro',
                'message' => 'Não foi possível excluir este cliente.',
                'icon' => 'success',
            ]);
        }
    }

    public function viewCliente($id)
    {
        $cliente = Cliente::find($id);
        $endereco = ClienteEndereco::where(['unique_endereco' => $cliente->unique_endereco])->get();
        $pets = PetDados::where(['unique_cliente' => $cliente->unique_cliente])->get();
        $titulo = 'Visualizando: ' . $cliente->cliente_nome;

        return view('dashboard.cliente_dados', compact('cliente', 'endereco', 'pets', 'titulo'));
    }

    public function history($id)
    {
        return view('historico');
    }

    public function viewClientePosCadastro(Request $request, $uniqueIdCliente)
    {
        $raca_pet  = PetRaca::all();
        $pets = PetDados::where(['unique_cliente' => $uniqueIdCliente])->get();
        $cliente = Cliente::where(['unique_cliente' => $uniqueIdCliente])->first();
        $tipo = "cadastroPets";
        return view('dashboard.cliente_cadastro', compact('raca_pet', 'pets', 'cliente', 'tipo'));
    }
}
