<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PacotePromocionalItem extends Model
{
    use HasFactory;

    protected $table = 'pacote_promocional_item';

    protected $fillable = [
        'unique_pacote_promocional',
        'unique_user',
        'item_nome',
        'item_quantidade_total',
        'item_custo_unitario',
        'item_custo_total',
        'item_porcentagem_desconto',
        'item_preco_final',
        'id_pacote_promocional'
    ];

    
    public function pacotes()
    {
        return $this->belongsTo(PacotePromocional::class, 'id_pacote_promocional', 'id');
    }
}
