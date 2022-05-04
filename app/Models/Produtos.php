<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Produtos extends Model
{
    use HasFactory;

    protected $table = 'produtos';

    protected $fillable = [
        'unique_user',
        'unique_produto',
        'produto_porcentagem_lucro',
        'produto_nome',
        'produto_codigo',
        'produto_custo',
        'produto_preco_de_venda',
        'produto_lucro',
        'produto_categoria'


    ];
}
