<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Servicos extends Model
{
    use HasFactory;
    protected $table = 'servicos';

    protected $fillable = [
        'unique_user',
        'unique_servico',
        'servico_nome',
        'servico_pet_raca',
        'servico_pet_porte',
        'servico_codigo',
        'servico_custo',
        'servico_porcentagem_lucro',
        'servico_preco_de_venda',
        'servico_lucro',
    ];
}
