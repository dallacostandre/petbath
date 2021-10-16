<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cliente extends Model
{
    use HasFactory;
    
    protected $table = 'cliente';

    protected $fillable = [
        'unique_user',
        'cliente_nome',
        'cliente_email',
        'cliente_telefone',
        'cliente_whatsapp',
        'unique_endereco',
        'unique_pet',
    ];
}
