<?php

namespace App\Http\Controllers;

use App\Models\Notificacoes;
use App\Models\PacotePromocional;
use App\Models\PacotePromocionalItem;
use App\Models\Produtos;
use App\Models\Servicos;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class PacotePromocionalController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $unique_user = User::find(Auth::id())->getUserUniqueId();
        $pacotePromocional = PacotePromocional::with('itens')->where(['unique_user' => $unique_user])->orderBy('pacote_status', 'DESC')->paginate(10);

        return view('dashboard.pacotes.index', compact('pacotePromocional'));
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
        if ($request) {
            $validate = Validator::make($request->all(), [
                'pacote_nome' => 'required',
                'preco_total_sugerido' => 'required',
                'preco_total_de_venda' => 'required',
                'itensTabela' => 'required',
            ]);

            // Valida os dados e recebidos e response caso esteja faltando.
            if ($validate->fails()) {
                return response()->json([
                    'title' => 'Ops,',
                    'text' => 'Parece que exitem campos faltando... verifique seu formulário.',
                    'icon' => 'warning',
                ]);
            } else {

                // Insere no banco de dados os dados validados e recebidos.
                $unique_pacote_promocional = uniqid();

                $unique_user_db = User::where(['id' => Auth::id()])->get('unique_user');
                $unique_user = $unique_user_db[0]->unique_user;

                // TOTAL PREÇO SUGERIGO - String para float
                $total_preco_sugerido = trim(str_replace('R$ ', ' ', $request->preco_total_sugerido));
                $total_preco_sugerido = str_replace('.', '', $total_preco_sugerido);
                $total_preco_sugerido = str_replace(',', '.', $total_preco_sugerido);

                // TOTAL PRECO DE VENDAS - String para float
                $preco_total_de_venda = trim(str_replace('R$ ', ' ', $request->preco_total_sugerido));
                $preco_total_de_venda = str_replace('.', '', $preco_total_de_venda);
                $preco_total_de_venda = str_replace(',', '.', $preco_total_de_venda);

                $pacotePromocional = new PacotePromocional();
                $pacotePromocional->unique_user = $unique_user;
                $pacotePromocional->unique_pacote_promocional = $unique_pacote_promocional;
                $pacotePromocional->pacote_nome = $request->pacote_nome;
                $pacotePromocional->pacote_total_preco_sugerido = $total_preco_sugerido;
                $pacotePromocional->pacote_total_preco_de_venda = $preco_total_de_venda;
                $pacotePromocional->pacote_observacoes = $request->pacote_observacoes;
                $pacotePromocional->pacote_pet_especie = $request->pacote_pet_especie;
                $pacotePromocional->pacote_pet_porte = $request->pacote_pet_porte;
                $pacotePromocional->pacote_status = 1; // ATIVA O PLANO PROMOCIONAL
                $pacotePromocional->save();

                foreach ($request->itensTabela as $dadoItem) {
                    $pacotePromocionalItem = new PacotePromocionalItem();
                    $pacotePromocionalItem->unique_user = $unique_user;
                    $pacotePromocionalItem->unique_pacote_promocional = $unique_pacote_promocional;

                    // String para float - Custo Total
                    $item_custo_total = trim(str_replace('R$ ', ' ', $dadoItem[3]));
                    $item_custo_total = str_replace('.', '', $item_custo_total);
                    $item_custo_total = str_replace(',', '.', $item_custo_total);
                    $item_custo_total = (float) $item_custo_total;

                    $array_soma_item_custos = [];
                    array_push($array_soma_item_custos, $item_custo_total);

                    // String para float - Custo Unitário
                    $item_custo_unitario = trim(str_replace('R$ ', ' ', $dadoItem[2]));
                    $item_custo_unitario = str_replace('.', '', $item_custo_unitario);
                    $item_custo_unitario = str_replace(',', '.', $item_custo_unitario);
                    $item_custo_unitario = (float) $item_custo_unitario;

                    // Calculo Quantidade Itens
                    $quantidadeItem = $item_custo_total / $item_custo_unitario;
                    $quantidadeItem = (int) $quantidadeItem;

                    // String para float - Preço Final
                    $item_preco_final = trim(str_replace('R$ ', ' ', $dadoItem[5]));
                    $item_preco_final = str_replace('.', '', $item_preco_final);
                    $item_preco_final = str_replace(',', '.', $item_preco_final);
                    $item_preco_final = (float) $item_preco_final;

                    $array_soma_preco_final = [];
                    array_push($array_soma_preco_final, $item_preco_final);

                    // Calculo da porcentagem de desconto por item
                    $porcentagem_desconto = (100 * $item_preco_final) / $item_custo_total;

                    // Adiciona os itens do Pacote
                    $pacotePromocionalItem->item_nome = $dadoItem[0]; // Nome do Item
                    $pacotePromocionalItem->item_quantidade_total = $quantidadeItem;  // Quantidade de Itens
                    $pacotePromocionalItem->item_custo_unitario = $item_custo_unitario; // Custo Unitário
                    $pacotePromocionalItem->item_custo_total = $item_custo_total; // Total Custo Unitário
                    $pacotePromocionalItem->item_porcentagem_desconto = $porcentagem_desconto; // Porcentagem
                    $pacotePromocionalItem->item_preco_final = $item_preco_final; // Preco Final
                    $pacotePromocionalItem->id_pacote_promocional = $pacotePromocional->id; // Preco Final
                    $pacotePromocionalItem->save();
                }

                $somaCustos = reset($array_soma_item_custos);
                $somaPreco = reset($array_soma_preco_final);

                $porcentagemFinal = (100 * $somaPreco) / $somaCustos;
                $porcentagemFinal = (int) $porcentagemFinal;
                PacotePromocional::where(['id' => $pacotePromocional->id])->update(['pacote_porcentagem_desconto' => $porcentagemFinal]);


                return response()->json([
                    'title' => 'Adicionado!',
                    'text' => 'Pacote promocional adicionado com sucesso.',
                    'icon' => 'success',
                    'code' => '200',
                    'url' => '/pacotes-promocionais',
                ]);
            }
        } else {
            return response()->json([
                'title' => 'Ops,',
                'text' => 'Parece que houve um erro com sua requisição.',
                'icon' => 'warning',
            ]);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\PacotePromocional  $pacotePromocional
     * @return \Illuminate\Http\Response
     */
    public function show(PacotePromocional $pacotePromocional)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\PacotePromocional  $pacotePromocional
     * @return \Illuminate\Http\Response
     */
    public function edit(PacotePromocional $pacotePromocional)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\PacotePromocional  $pacotePromocional
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, PacotePromocional $pacotePromocional)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\PacotePromocional  $pacotePromocional
     * @return \Illuminate\Http\Response
     */
    public function destroy(PacotePromocional $pacotePromocional, Request $request)
    {
        if ($request->ajax()) {
            PacotePromocional::destroy($request->id);
            return response()->json([
                'message' => 'Pacote Promocional excluído com sucesso!',
                'icon' => 'success',
                'title' =>  'Excluído',
            ]);
        } else {
            return response()->json([
                'title' => 'Ops,',
                'text' => 'Parece que houve um erro com sua requisição.',
                'icon' => 'warning',
            ]);
        }
    }

    /**
     * Procura todos os servios e Produtos Cadastrados pelo usuário.
     *
     * @param  \App\Models\PacotePromocional  $pacotePromocional
     * @return \Illuminate\Http\Response
     */

    public function getAllServicosProdutos(Request $request)
    {
        if ($request->ajax()) {
            $unique_user_db = User::where(['id' => Auth::id()])->first();

            $resultsProduto = Produtos::where(['unique_user' => $unique_user_db->unique_user])
                ->orWhere('produto_nome', 'like', '%' . $request->texto_digitado . '%')
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
                ->orWhere('servico_nome', 'like', '%' . $request->texto_digitado . '%')
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
            'message' => 'Erro ao procurar o serviço ou produto.',
            'icon' => 'error',
        ]);
    }

    /**
     * Disable the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\PacotePromocional  $pacotePromocional
     * @return \Illuminate\Http\Response
     */
    public function enabledisable(Request $request, PacotePromocional $pacotePromocional)
    {
        if ($request->ajax()) {
            $statusAtual = PacotePromocional::where(['id' => $request->id])->first();
            if ($statusAtual->pacote_status == 0) {
                PacotePromocional::where(['id' => $request->id])->update(['pacote_status' => 1]);
                return response()->json([
                    'title' => 'Pacote habilitado.',
                    'message' => 'Sucesso ao desabilitar o pacote promocional.',
                    'icon' => 'success',
                ]);
            } else {
                PacotePromocional::where(['id' => $request->id])->update(['pacote_status' => 0]);
                return response()->json([
                    'title' => 'Pacote desabilitado.',
                    'message' => 'Sucesso ao desabilitar o pacote promocional.',
                    'icon' => 'success',
                ]);
            }
        }
        return response()->json([
            'title' => 'Houve um erro',
            'message' => 'Erro ao alterar o status deste pacote.',
            'icon' => 'error',
        ]);
    }
}
