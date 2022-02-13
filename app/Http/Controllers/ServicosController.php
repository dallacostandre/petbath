<?php

namespace App\Http\Controllers;

use App\Models\PetRaca;
use App\Models\Produtos;
use App\Models\Servicos;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ServicosController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $produtos = Produtos::orderBy('id', 'DESC')->paginate(10);
        $servicos = Servicos::orderBy('id', 'DESC')->paginate(10);
        $raca_pet  = PetRaca::all();
        
        return view('dashboard.produtos_e_servicos', compact('servicos', 'raca_pet', 'produtos'));
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
    public function destroy(Servicos $servicos)
    {
        //
    }
}
