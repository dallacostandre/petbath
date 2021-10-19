<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ClienteEndereco extends Model
{
    use HasFactory;

    protected $table = 'cliente_endereco';

    protected $fillable = [
        'unique_endereço',
        'cliente_rua',
        'cliente_numero',
        'cliente_bairro',
        'cliente_complemento',
        'cliente_cep',
        'cliente_estado',
        'cliente_cidade',
    ];
}
