<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Servicos extends Model
{
    use HasFactory;
    protected $table = ['servicos'];

    protected $fillable = [
        'unique_user',
        'unique_servico',
        'servico_nome',
        'servico_tempo',
        'servico_preco'
    ];
}
