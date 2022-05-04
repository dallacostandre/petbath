<?php

namespace App\Http\Controllers;

use App\Models\PetRaca;
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
        $unique_user = User::find(Auth::id())->getUserUniqueId();
        $produtos = Produtos::orderBy('id', 'DESC')->where(['unique_user' => $unique_user])->paginate(10);
        $raca_pet  = PetRaca::all();

        return view('dashboard.lista_produtos', compact('raca_pet', 'produtos'));
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
            $validate = Validator::make($request->all(), [
                'produto_porcentagem_lucro' => 'required',
                'produto_nome' => 'required',
                'produto_custo' => 'required',
                'produto_preco_de_venda' => 'required',
                'produto_lucro' => 'required',
            ]);

            if ($validate->fails()) {
                return response()->json([
                    'title' => 'Campo faltando',
                    'text' => 'Ops, existem campos que estão em branco.',
                    'icon' => 'warning',
                ]);
            };

            $data = $request->all();
            $unique_produto = uniqid();

            $unique_user_db = User::where(['id' => Auth::id()])->get('unique_user');
            $unique_user = $unique_user_db[0]->unique_user;
            // dd($unique_user);

            $produto = new Produtos();
            $produto->unique_user = $unique_user;
            $produto->unique_produto = $unique_produto;
            $produto->produto_porcentagem_lucro = $data['produto_porcentagem_lucro'];
            $produto->produto_nome = $data['produto_nome'];
            $produto->produto_categoria = $data['produto_categoria'];
            $produto->produto_codigo = $data['produto_codigo'];
            $produto->produto_custo = $data['produto_custo'];
            $produto->produto_especie = $data['produto_especie'];
            $produto->produto_preco_de_venda = $data['produto_preco_de_venda'];
            $produto->produto_lucro = $data['produto_lucro'];
            $produto->save();

            return response()->json([
                'title' => 'Produdo Cadastrado',
                'text' => 'Produto adicionado com sucesso.',
                'icon' => 'success',
                'code' => '200'
            ]);
        } else {
            return response()->json([
                'title' => 'Ops, houve um erro.',
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
    public function edit(Request $request)
    {
        if ($request->id) {
            $objProdutos = Produtos::find($request->id);
            $dados = [
                'produto_nome' => $objProdutos->produto_nome,
                'produto_codigo' => $objProdutos->produto_codigo,
                'produto_custo' => $objProdutos->produto_custo,
                'produto_preco_de_venda' => $objProdutos->produto_preco_de_venda,
                'produto_porcentagem_lucro' => $objProdutos->produto_porcentagem_lucro,
                'produto_lucro' => $objProdutos->produto_lucro,
                'produto_categoria' => $objProdutos->produto_categoria,
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
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {

        if($request->id){
            Produtos::find($request->id)->update($request->all());
            return response()->json([
                'title' => 'Produto atualizado com sucesso.',
                'text' => 'Sucesso ao atualizar este produto.',
                'icon' => 'success',
                'code' => '200'
            ]);
        }else{
            return response()->json([
                'title' => 'Ops, houve um errro ao atualizar.',
                'text' => 'Não foi possível atualizar este produto.',
                'icon' => 'success',
            ]);
        }
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
