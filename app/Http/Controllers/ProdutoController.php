<?php

namespace App\Http\Controllers;

use App\Models\Produtos;
use Illuminate\Http\Request;

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
            Produtos::create($request->all());
            return response()->json([
                'icone' => 'success',
                'title' => 'Cadastrado',
                'mensagem' => 'Produto cadastrado com sucesso',
            ]);
        } else {
            return response()->json([
                'icone' => 'warning',
                'title' => 'Não foi possível realizar um cadastro',
                'mensagem' => 'Erro ao cadastrar produto, tente novamente.',
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
                'icone' => 'success',
                'title' => 'Produto excluído com sucesso.',
                'mensagem' => 'Sucesso ao excluir produto.',
            ]);
        } else {
            return response()->json([
                'icone' => 'error',
                'title' => 'Produto não excluído.',
                'mensagem' => 'Erro ao excluir seu produto.',
            ]);
        }
    }
}
