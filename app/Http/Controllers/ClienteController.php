<?php

namespace App\Http\Controllers;

use App\Http\Requests\CadastroClienteRequest;
use App\Models\Cliente;
use App\Models\ClienteEndereco;
use App\Models\PetDados;
use App\Models\PetRaca;
use App\Models\User;
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
        Descricao: Funcao que adiciona o cliente e o pet_1
        Data: 07/01/2022
        Status: Funcionando
    */
    public function store(CadastroClienteRequest $request)
    {
        $unique_user = Auth::user()->unique_user; // Busca o codigo do Usuário
        $unique_endereco = uniqid(); // Cria um codigo único para o Endeço do Cliente
        $unique_cliente = uniqid(); // Cria um codigo único para o Cliente
        $unique_pet_1 = uniqid(); // Cria um codigo único para o Primeiro Pet

        $whatsapp_str = clean($request->cliente_telefone);
        $telefone_str = clean($request->cliente_telefone);
        $whatsapp = str_replace('-', '', $whatsapp_str);
        $telefone = str_replace('-', '', $telefone_str);

        // VALIDAR SE HÁ EMAIL E NÚMERO CADASTRADO ANTES DE QUALQUER COISA -<<<
        $email_usado = Cliente::where(['cliente_email' => $request->cliente_email])->get();
        $telefone_usado = Cliente::where(['cliente_telefone' => $request->cliente_telefone])->get();

        if (count($email_usado) >= 1) {
            return back()->with([
                'message' => 'Email já cadastrado',
            ]);
            exit();
        } elseif (count($telefone_usado) >= 1) {
            return back()->back([
                'message' => 'Telefone já cadastrado',
            ]);
            exit();
        } else {

            $data = $request->all();

            $cliente = new Cliente();
            $cliente->unique_user = $unique_user;
            $cliente->unique_endereco = $unique_endereco;
            $cliente->unique_cliente = $unique_cliente;
            $cliente->cliente_nome = strtolower($request->cliente_nome);
            $cliente->cliente_email = $data['cliente_email'];
            $cliente->cliente_telefone = $telefone;
            $cliente->cliente_whatsapp = $whatsapp;
            $cliente->cliente_instagram = str_replace(' ','', $data['cliente_instagram']);
            $cliente->save();

            $endereco_cliente = new ClienteEndereco();
            $endereco_cliente->unique_endereco = $unique_endereco;
            $endereco_cliente->cliente_rua = $data['cliente_rua'];
            $endereco_cliente->cliente_numero = $data['cliente_numero'];
            $endereco_cliente->cliente_bairro = $data['cliente_bairro'];
            $endereco_cliente->cliente_complemento = $data['cliente_complemento'];
            $endereco_cliente->cliente_cep = $data['cliente_cep'];
            $endereco_cliente->cliente_estado = $data['cliente_estado'];
            $endereco_cliente->cliente_cidade = $data['cliente_cidade'];
            $endereco_cliente->save();

            $pet_cliente = new PetDados();
            $pet_cliente->unique_pet = $unique_pet_1;
            $pet_cliente->unique_user = $unique_user;
            $pet_cliente->unique_cliente = $unique_cliente;
            $pet_cliente->pet_nome = $data['pet_nome'];
            $pet_cliente->pet_raca = $data['pet_raca'];
            $pet_cliente->pet_porte = $data['pet_porte'];
            $pet_cliente->pet_genero = $data['pet_genero'];
            $pet_cliente->pet_genero = $data['pet_genero'];
            $pet_cliente->pet_especie = $data['pet_especie'];
            $pet_cliente->pet_observacoes = $data['pet_observacoes'];
            $pet_cliente->pet_pelagem = $data['pet_pelagem'];
            $pet_cliente->save();

            return Redirect::route('clientes')->with(['message' => 'Cliente adicionado com sucesso!']);
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
        $cliente = Cliente::find($id);
        $uniqueEnderecoObject = Cliente::where(['unique_endereco' => $cliente->unique_endereco])->get();
        $uniqueEndereco = $uniqueEnderecoObject[0]->unique_endereco;
        $endereco = ClienteEndereco::where(['unique_endereco' => $uniqueEndereco])->first();
        $titulo = 'Editando: ' . $cliente->cliente_nome;
        $raca_pet  = PetRaca::all();

        return view('dashboard.cliente_cadastro', compact(
            'cliente',
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
        $id = $request->id;
        $data = $request->all();
        $user = Cliente::find($id);
        $whatsapp_str = clean($data['cliente_whatsapp']);
        $telefone_str = clean($data['cliente_telefone']);
        $whatsapp = str_replace('-', '', $whatsapp_str);
        $telefone = str_replace('-', '', $telefone_str);

        // VALIDAR SE HÁ EMAIL E NÚMERO CADASTRADO ANTES DE QUALQUER COISA -<<<
        // $email_usado = Cliente::where(['cliente_email' => $request->cliente_email])->get();
        // $telefone_usado = Cliente::where(['cliente_telefone' => $request->cliente_telefone])->get();

        $cliente = Cliente::find($id);
        $cliente->cliente_nome = strtolower($data['cliente_nome']);
        $cliente->cliente_email = $data['cliente_email'];
        $cliente->cliente_telefone = $telefone;
        $cliente->cliente_whatsapp = $whatsapp;
        $cliente->cliente_instagram = str_replace(' ','', $data['cliente_instagram']);
        $cliente->save();

        $endereco_cliente = ClienteEndereco::where('unique_endereco', $user->unique_endereco)->first();
        $endereco_cliente->cliente_rua = $data['cliente_rua'];
        $endereco_cliente->cliente_numero = $data['cliente_numero'];
        $endereco_cliente->cliente_bairro = $data['cliente_bairro'];
        $endereco_cliente->cliente_complemento = $data['cliente_complemento'];
        $endereco_cliente->cliente_cep = $data['cliente_cep'];
        $endereco_cliente->cliente_estado = $data['cliente_estado'];
        $endereco_cliente->cliente_cidade = $data['cliente_cidade'];
        $endereco_cliente->save();

        return Redirect::route('clientes')->with(['message' => 'Cliente atualizado com sucesso!']);
    }


    public function destroy($id)
    {
        if ($id) {
            // Encontra o clientes
            $cliente = Cliente::find($id);
            // Encontra o codigo unico do cliente
            $unique = Cliente::where(['unique_endereco' => $cliente->unique_endereco])->first();
            // Encontra o codigo de endereço do cliente na tabela cliente
            $unique_endereco = $unique->unique_endereco;
            // Encontrar o endereço a ser excluido
            $endereco = ClienteEndereco::where(['unique_endereco' => $unique_endereco])->get();
            $id_endereco = $endereco[0]->id;

            Cliente::destroy($id);
            ClienteEndereco::destroy($id_endereco);

            return back()->with(['success' => 'Cliente removido com sucesso.']);
        } else {
            return back()->with(['success' => 'Não foi possível excluir.']);
        }
    }

    public function visualizarCliente($id)
    {
        $cliente = Cliente::find($id);
        $endereco = ClienteEndereco::where(['unique_endereco' => $cliente->unique_endereco])->get();
        $pets = PetDados::where(['unique_cliente' => $cliente->unique_cliente])->get();

        return view('visualizar_dados_cliente', compact('cliente', 'endereco', 'pets'));
    }

    public function historicoCliente($id)
    {
        return view('historico');
    }
}
