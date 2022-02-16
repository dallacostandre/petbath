<?php

namespace App\Http\Controllers;

use App\Models\PetRaca;
use App\Models\Produtos;
use App\Models\Servicos;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    public function getUser()
    {
        $unique_user_db = User::where(['id' => Auth::id()])->get('unique_user');
        $unique_user = $unique_user_db[0]->unique_user;
    }

    public function produtosEServicosIndex()
    {
        $unique_user = User::find(Auth::id())->getUserUniqueId();
        $produtos = Produtos::orderBy('id', 'DESC')->where(['unique_user'=> $unique_user])->paginate(10);
        $servicos = Servicos::orderBy('id', 'DESC')->where(['unique_user'=> $unique_user])->paginate(10);
        $raca_pet  = PetRaca::all();
        
        return view('dashboard.produtos_e_servicos', compact('servicos', 'raca_pet', 'produtos'));
    }

    public function pacotesEPromocoes()
    {
        $unique_user = User::find(Auth::id())->getUserUniqueId();
        $servicos = Servicos::orderBy('id', 'DESC')->where(['unique_user'=> $unique_user])->get();
        $produtos = Produtos::orderBy('id', 'DESC')->where(['unique_user'=> $unique_user])->get();

        return view('dashboard.pacotes_e_promocoes', compact('servicos', 'produtos'));

    }
}
