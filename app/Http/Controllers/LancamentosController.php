<?php

namespace App\Http\Controllers;

use App\Models\Lancamentos;
use App\Models\LancamentosRecorrencia;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Date;
use Illuminate\Support\Facades\Validator;

class LancamentosController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $titulo = 'Lançamentos';
        return view('dashboard.financeiro.lancamento.index', compact('titulo'));
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
                'lancamento_natureza' => 'required',
                'lancamento_descricao' => 'required',
                'lancamento_tipo_recebimento_pagamento' => 'required',
                'lancamento_valor_previsto' => 'required',
                'lancamento_data_prevista' => 'required',
                'lancamento_categoria' => 'required',
                'lancamento_recorrencia' => 'required',
            ]);

            if ($validate->fails()) {
                return response()->json([
                    'title' => 'Atenção!',
                    'text' => 'Ops, existem campos obrigatórios que estão em branco.',
                    'icon' => 'warning',
                ]);
            };

            // SELECIONA TODOS OS DADOS DO LANÇAMENTO
            $data = $request->all();

            // BUSCA O ID DO USUÁRIO;
            $unique_user_db = new User();
            $unique_user = $unique_user_db->getUserUniqueId();

            // TOTAL PRECO DE VENDAS - String para float
            $lancamento_valor_previsto = trim(str_replace('R$ ', ' ', $request->lancamento_valor_previsto));
            $lancamento_valor_previsto = str_replace('.', '', $lancamento_valor_previsto);
            $lancamento_valor_previsto = str_replace(',', '.', $lancamento_valor_previsto);

            // CADASTRA NO BANDO O NOVO LANÇAMENTO
            $lancamento = new Lancamentos();
            $lancamento->unique_user = $unique_user;
            $lancamento->lancamento_natureza = $request->lancamento_natureza; // 0 - DESPESA // 1 - RECEITA
            $lancamento->lancamento_descricao = $request->lancamento_descricao;
            $lancamento->lancamento_tipo_recebimento_pagamento = $request->lancamento_tipo_recebimento_pagamento;
            $lancamento->lancamento_valor_previsto = $lancamento_valor_previsto;
            $lancamento->lancamento_data_prevista = $request->lancamento_data_prevista;
            $lancamento->lancamento_categoria = $request->lancamento_categoria;
            $lancamento->save();

            $qntParcelas = (int)$request->lancamento_parcela;

            // lancamento_periodo | 1 - Semanal //2 - Mensal // 3 - Semestral // 4 - Anual 

            // DESENHAR A REGRA DE NEGÓCIO 
            
            for ($i = 1; $i < $qntParcelas; $i++) {
                $recorrencia = new LancamentosRecorrencia();
                $recorrencia->recorrencia_parcela = $i;
                $recorrencia->recorrencia_data = $request->lancamento_data_prevista;               
                $recorrencia->recorrencia_valor_pago = $lancamento_valor_previsto; 
                $recorrencia->id_lancamento =  $lancamento->id; // Preco Final               
                $recorrencia->save();
            }

            return response()->json([
                'title' => 'Lançamento Cadastrado',
                'text' => 'Lançamento Cadastrado com sucesso.',
                'icon' => 'success',
                'code' => '200'
            ]);
        } else {
            return response()->json([
                'title' => 'Ops, houve um erro.',
                'text' => 'Erro ao cadastrar lançamento, tente novamente.',
                'icon' => 'warning',
            ]);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Lancamentos  $lancamentos
     * @return \Illuminate\Http\Response
     */
    public function show(Lancamentos $lancamentos)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Lancamentos  $lancamentos
     * @return \Illuminate\Http\Response
     */
    public function edit(Lancamentos $lancamentos)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Lancamentos  $lancamentos
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Lancamentos $lancamentos)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Lancamentos  $lancamentos
     * @return \Illuminate\Http\Response
     */
    public function destroy(Lancamentos $lancamentos)
    {
        //
    }
}
