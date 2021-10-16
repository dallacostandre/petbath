<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Financeiro extends Model
{
    use HasFactory;
    protected $table = 'financeiro';

    protected $fillable = [
        'unique_user',
        'unique_servico',
        'financeiro_entrada',
        'financeiro_saida',
    ];
}
