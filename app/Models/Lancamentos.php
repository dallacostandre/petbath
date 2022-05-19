<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Lancamentos extends Model
{
    use HasFactory;

    protected $fillable = [
        'unique_user',
        'lancamento_natureza',
        'lancamento_descricao',
        'lancamento_tipo_recebimento_pagamento',
        'lancamento_valor_previsto',
        'lancamento_data_prevista',
        'lancamento_categoria',
    ];

    public function getRecorrencias()
    {
        return $this->hasMany(LancamentosRecorrencia::class, 'id_lancamento', 'id');
    }
}
