<?php

namespace App\Http\Controllers;

use App\Models\PetRaca;
use App\Models\Produtos;
use App\Models\Servicos;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use LDAP\Result;

class ServicosController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
    }

    public function cadastroServicoView()
    {
        return view('cadastro_servico', compact('raca_pet'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        if ($request) {
            $data = $request->all();
            $unique_servico = uniqid();

            $unique_user_db = User::where(['id' => Auth::id()])->get('unique_user');
            $unique_user = $unique_user_db[0]->unique_user;

            $servicos = new Servicos();
            $servicos->unique_servico = $unique_servico;
            $servicos->unique_user = $unique_user;
            $servicos->servico_nome = $data['servico_nome'];
            $servicos->servico_pet_raca = $data['servico_pet_raca'];
            $servicos->servico_pet_porte = $data['servico_pet_porte'];
            $servicos->servico_codigo = $data['servico_codigo'];
            $servicos->servico_custo = $data['servico_custo'];
            $servicos->servico_porcentagem_lucro = $data['servico_porcentagem_lucro'];
            $servicos->servico_preco_de_venda = $data['servico_preco_de_venda'];
            $servicos->servico_lucro = $data['servico_lucro'];
            $servicos->save();

            return response()->json([
                'title' => 'Serviço Cadastrado',
                'text' => 'Serviço foi cadastrado com sucesso.',
                'icon' => 'success',
            ]);
        } else {
            return response()->json([
                'title' => 'Houve um erro Cadastrado',
                'text' => 'Houve um erro ao cadastrar o serviço',
                'icon' => 'error',
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
     * @param  \App\Models\Servicos  $servicos
     * @return \Illuminate\Http\Response
     */
    public function show(Servicos $servicos)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Servicos  $servicos
     * @return \Illuminate\Http\Response
     */
    public function edit(Servicos $servicos)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Servicos  $servicos
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Servicos $servicos)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Servicos  $servicos
     * @return \Illuminate\Http\Response
     */
    public function destroy(Servicos $servicos, Request $request)
    {
        $id = $request->id;
        $resposta = Servicos::findOrFail($id);
        if ($resposta) {
            $resposta->delete();
            return response()->json([
                'title' => 'Serviço excluído com sucesso.',
                'text' => 'Sucesso ao excluir Serviço.',
                'icon' => 'success',
            ]);
        } else {
            return response()->json([
                'title' => 'Serviço não excluído.',
                'text' => 'Erro ao excluir seu Serviço.',
                'icon' => 'error',
            ]);
        }
    }

    public function getServicoPreco(Request $request)
    {
        $id = $request->id;
        $resposta = Servicos::where(['id' => $id])->first();
        if ($resposta) {
            return response()->json([
                'value' => $resposta->servico_preco_de_venda,
                'text' => 'Sucesso ao procurar serviço. Servico encontrado.',
            ]);
        } else {
            return response()->json([
                'icon' => 'error',
                'title' => 'Preco do servico não foi não encontrado.',
                'text' => 'Erro ao procurar preco do serviço.',
            ]);
        }
    }

    public function getServicosTable(Request $request)
    {
        if ($request->ajax()) {
            $id = $request->id;
            $response = Servicos::where(['id' => $id])->get();
            return response()->json([
                'return' => $response,
            ]);
        }
        return response()->json([
            'icon' => 'error',
            'title' => 'Preco do servico não foi não encontrado.',
            'text' => 'Erro ao procurar o serviço.',
        ]);
    }

    public function getAllServicosProdutos(Request $request)
    {
        if ($request->ajax()) {
            $unique_user_db = User::where(['id' => Auth::id()])->first();
            $resultsProduto = Produtos::where(['unique_user' => $unique_user_db->unique_user])->orderBy('id', 'ASC')->get();
            
            foreach ($resultsProduto as $key => $v) {
                $arrayProdutoParaAutoComplete[] = [
                    "id" => $v->id, 
                    "value" => $v->produto_nome,
                    "custo" => $v->produto_custo,
                    "unique_produto" => $v->unique_produto,   
                ];
            }

            $resultsServico = Servicos::where(['unique_user' => $unique_user_db->unique_user])->orderBy('id', 'ASC')->get();

            foreach ($resultsServico as $key => $v) {
                $arrayServicoParaAutoComplete[] = [
                    "id" => $v->id, 
                    "value" => $v->servico_nome,
                    "custo" => $v->servico_custo,
                    "unique_servico" => $v->unique_servico
                ];
            }


            $result = array_merge($arrayServicoParaAutoComplete, $arrayProdutoParaAutoComplete);

            return response()->json($result);
        }
        return response()->json([
            'icon' => 'error',
            'title' => 'Produto e servico não foram encontrados.',
            'text' => 'Erro ao procurar o serviço.',
        ]);
    }
}
