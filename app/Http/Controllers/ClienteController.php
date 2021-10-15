<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ClienteController extends Controller
{
    public function create(Request $request)
    {
        dd($request->all());

        // guarda no banco de dados as informações sobre o cliente

        /*         "telefone" => "Quo consectetur odi"
        "whatspp" => "In saepe dicta sit l"
        "nome" => "Debitis sint repudia"
        "sobrenome" => "Porro enim et volupt"
        "cep" => "81210310" */
    }
}
