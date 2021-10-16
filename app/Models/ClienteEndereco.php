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
        'user_rua',
        'user_numero',
        'user_bairro',
        'user_complemento',
        'user_cep',
        'user_estado',
        'user_cidade',
    ];
}
