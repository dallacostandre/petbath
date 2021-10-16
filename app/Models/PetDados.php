<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PetDados extends Model
{
    use HasFactory;
    protected $table = 'pet_dados';

    protected $fillable = [
        'unique_pet',
        'pet_nome',
        'pet_raca',
        'pet_porte',
        'pet_genero',
        'pet_especie',
        'pet_observacoes',
        'pet_alergias',
        'pet_foto',
    ];
    
 
}
