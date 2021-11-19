<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ConfiguracaoController extends Controller
{
    public function index()
    {
        return view('configuracoes');
    }

    public function configuracoesPerfil()
    {
        return view('configuracoes_perfil');
    }
}
