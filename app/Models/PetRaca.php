<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PetRaca extends Model
{
    use HasFactory;

    protected $table = 'pet_racas';

    protected $fillable = [
        'nome_raca'
    ];
}
