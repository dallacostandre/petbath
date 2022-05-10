<?php

namespace App\Http\Controllers;

use App\Models\PacoteEPromocoes;
use App\Models\Produtos;
use App\Models\Servicos;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PacoteEPromocoesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $unique_user = User::find(Auth::id())->getUserUniqueId();
        $servicos = Servicos::orderBy('id', 'DESC')->where(['unique_user' => $unique_user])->get();
        $produtos = Produtos::orderBy('id', 'DESC')->where(['unique_user' => $unique_user])->get();

        return view('dashboard.pacotes.index', compact('servicos', 'produtos', 'unique_user'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('dashboard.pacotes.create');
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
     * @param  \App\Models\PacoteEPromocoes  $pacoteEPromocoes
     * @return \Illuminate\Http\Response
     */
    public function show(PacoteEPromocoes $pacoteEPromocoes)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\PacoteEPromocoes  $pacoteEPromocoes
     * @return \Illuminate\Http\Response
     */
    public function edit(PacoteEPromocoes $pacoteEPromocoes)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\PacoteEPromocoes  $pacoteEPromocoes
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, PacoteEPromocoes $pacoteEPromocoes)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\PacoteEPromocoes  $pacoteEPromocoes
     * @return \Illuminate\Http\Response
     */
    public function destroy(PacoteEPromocoes $pacoteEPromocoes)
    {
        //
    }

    /**
     * Procura todos os servios e Produtos Cadastrados pelo usuário.
     *
     * @param  \App\Models\PacoteEPromocoes  $pacoteEPromocoes
     * @return \Illuminate\Http\Response
     */

    public function getAllServicosProdutos(Request $request)
    {
        if ($request->ajax()) {
            $unique_user_db = User::where(['id' => Auth::id()])->first();

            $resultsProduto = Produtos::where(['unique_user' => $unique_user_db->unique_user])
            ->orWhere('produto_nome', 'like', '%'.$request->texto_digitado.'%')
            ->orderBy('id', 'ASC')->get();


            foreach ($resultsProduto as $key => $v) {
                $arrayProdutoParaAutoComplete[] = [
                    "id" => $v->id,
                    "value" => $v->produto_nome,
                    "custo" => $v->produto_custo,
                    "unique_produto" => $v->unique_produto,
                ];
            }

            $resultsServico = Servicos::where(['unique_user' => $unique_user_db->unique_user])
            ->orWhere('servico_nome', 'like', '%'.$request->texto_digitado.'%')
            ->orderBy('id', 'ASC')->get();

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
            'title' => 'Produto e servico não foram encontrados.',
            'message' => 'Erro ao procurar o serviço ou produco.',
            'icon' => 'error',
        ]);
    }
}
