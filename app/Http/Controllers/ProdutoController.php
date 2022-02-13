<?php

namespace App\Http\Controllers;

use App\Models\Produtos;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class ProdutoController extends Controller
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
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        if ($request) {

            $validate = Validator::make($request->all(),[
                'produto_porcentagem_lucro' => 'require d',
                'produto_nome' => 'required',
                'produto_codigo' => 'required',
                'produto_custo' => 'required',
                'produto_preco_de_venda' => 'required',
                'produto_lucro' => 'required',
            ]);

            if ($validate->fails()) {
                return response()->json([
                    'title' => 'Campo faltando',
                    'text' => 'Ops, existem campos que estão em branco. ',
                    'icon' => 'warning',
                ]);
            };

            $data = $request->all();
            $unique_produto = uniqid();

            $unique_user_db = User::where(['id' => Auth::id()])->get('unique_user');
            $unique_user = $unique_user_db[0]->unique_user;

            $produto = new Produtos();
            $produto->unique_user = $unique_user;
            $produto->unique_produto = $unique_produto;
            $produto->produto_porcentagem_lucro = $data['produto_porcentagem_lucro'];
            $produto->produto_nome = $data['produto_nome'];
            $produto->produto_codigo = $data['produto_codigo'];
            $produto->produto_custo = $data['produto_custo'];
            $produto->produto_preco_de_venda = $data['produto_preco_de_venda'];
            $produto->produto_lucro = $data['produto_lucro'];
            $produto->save();
            
            return response()->json([
                'title' => 'Cadastrado',
                'text' => 'Produto cadastrado com sucesso',
                'icon' => 'success',
            ]);
        } else {
            return response()->json([
                'title' => 'Não foi possível realizar um cadastro',
                'text' => 'Erro ao cadastrar produto, tente novamente.',
                'icon' => 'warning',
            ]);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        $id = $request->id;
        $resposta = Produtos::findOrFail($id);
        if ($resposta) {
            $resposta->delete();
            return response()->json([
                'title' => 'Produto excluído com sucesso.',
                'text' => 'Sucesso ao excluir produto.',
                'icon' => 'success',
            ]);
        } else {
            return response()->json([
                'title' => 'Produto não excluído.',
                'text' => 'Erro ao excluir seu produto.',
                'icon' => 'error',
            ]);
        }
    }
}
