<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Agendamento extends Model
{
    use HasFactory;
    
    protected $table = ['agendamento'];
    
    protected $fillable = [
        'unique_pet',
        'unique_user',
        'unique_servico',
        'agendamento_data_horario'
    ];
}
