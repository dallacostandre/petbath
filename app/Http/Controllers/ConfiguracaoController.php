<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ConfiguracaoController extends Controller
{
    public function index()
    {
        return view('dashboard.configuracoes');
    }

    public function editarPerfil()
    {
        return view('dashboard.editar_perfil');
    }

    public function planosAssinaturas()
    {
        return view('dashboard.planos_assinaturas_usuario');
    }
}
