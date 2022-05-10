<?php

namespace App\Http\Controllers;

use App\Models\PetRaca;
use App\Models\Produtos;
use App\Models\Servicos;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;
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
        $unique_user = User::find(Auth::id())->getUserUniqueId();
        $servicos = Servicos::orderBy('id', 'DESC')->where(['unique_user' => $unique_user])->paginate(10);
        $raca_pet  = PetRaca::all();

        return view('dashboard.lista_servicos', compact('raca_pet', 'servicos'));
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
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        if ($request) {
            $data = $request->all();
            $unique_servico = uniqid();

            $unique_user_db = User::where(['id' => Auth::id()])->get('unique_user');
            $unique_user = $unique_user_db[0]->unique_user;
            
            $validate = Validator::make($request->all(), [
                'servico_nome' => 'required',
                'servico_pet_raca' => 'required',
                'servico_pet_porte' => 'required',
                'servico_custo' => 'required',
                'servico_porcentagem_lucro' => 'required',
                'servico_preco_de_venda' => 'required',
                'servico_lucro' => 'required',
            ]);

            if ($validate->fails()) {
                return response()->json([
                    'title' => 'Ops, parece que tem campos faltando.',
                    'text' => 'Ops, existem campos que estão em branco.',
                    'icon' => 'warning',
                ]);
            };

            $servicos = new Servicos();
            $servicos->unique_servico = $unique_servico;
            $servicos->unique_user = $unique_user;
            $servicos->servico_nome = $data['servico_nome'];
            $servicos->servico_pet_raca = $data['servico_pet_raca'];
            $servicos->servico_pet_porte = $data['servico_pet_porte'];
            $servicos->servico_codigo = $data['servico_codigo'];
            $servicos->servico_custo = $data['servico_custo'];
            $servicos->servico_especie = $data['servico_especie'];
            $servicos->servico_porcentagem_lucro = $data['servico_porcentagem_lucro'];
            $servicos->servico_preco_de_venda = $data['servico_preco_de_venda'];
            $servicos->servico_lucro = $data['servico_lucro'];
            $servicos->save();

            return response()->json([
                'title' => 'Serviço Cadastrado',
                'text' => 'Serviço foi cadastrado com sucesso.',
                'icon' => 'success',
                'code' => '200' 
            ]);
        } else {
            return response()->json([
                'title' => 'Houve um erro no cadastro',
                'text' => 'Houve um erro ao cadastrar o serviço',
                'icon' => 'error',
                
            ]);
        }
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
    public function edit(Servicos $servicos, Request $request)
    {
        if ($request->id) {
            $objServico = Servicos::find($request->id);
            $dados = [
                'servico_nome' => $objServico->servico_nome,
                'servico_pet_raca' => $objServico->servico_pet_raca,
                'servico_pet_porte' => $objServico->servico_pet_porte,
                'servico_codigo' => $objServico->servico_codigo,
                'servico_custo' => $objServico->servico_custo,
                'servico_porcentagem_lucro' => $objServico->servico_porcentagem_lucro,
                'servico_preco_de_venda' => $objServico->servico_preco_de_venda,
                'servico_lucro' => $objServico->servico_lucro,
            ];
            return response()->json([
                'dados' => $dados,
            ]);
        } else {
            return response()->json([
                'message' => 'Houve um erro. Não foi encontrado nenhum produto.',
                'icon' => 'error',
                'title' => 'Produto não encontrado.',
            ]);
        }
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
        if($request->id){
            $validate = Validator::make($request->all(), [
                'servico_nome' => 'required',
                'servico_pet_raca' => 'required',
                'servico_pet_porte' => 'required',
                'servico_custo' => 'required',
                'servico_porcentagem_lucro' => 'required',
                'servico_preco_de_venda' => 'required',
                'servico_lucro' => 'required',
                'servico_especie' => 'required',
            ]);

            if ($validate->fails()) {
                return response()->json([
                    'title' => 'Campo faltando',
                    'text' => 'Ops, existem campos que estão em branco.',
                    'icon' => 'warning',
                ]);
            };
            Servicos::find($request->id)->update($request->all());
            return response()->json([
                'title' => 'Serviço atualizado com sucesso.',
                'text' => 'Sucesso ao atualizar este serviço.',
                'icon' => 'success',
                'code' => '200'
            ]);
        }else{
            return response()->json([
                'title' => 'Ops, houve um errro ao atualizar.',
                'text' => 'Não foi possível atualizar este serviço.',
                'icon' => 'success',
            ]);
        }
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



}
