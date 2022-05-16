<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PacotePromocional extends Model
{
    use HasFactory;

    protected $table = 'pacote_promocional';

    protected $fillable = [
        'unique_user',
        'unique_pacote_promocional',
        'pacote_nome',
        'pacote_total_preco_sugerido',
        'pacote_total_preco_de_venda',
        'pacote_observacoes',
        'pacote_porcentagem_desconto',
        'pacote_status'
    ];

    public function itens()
    {
        return $this->hasMany(PacotePromocionalItem::class, 'id_pacote_promocional', 'id');
    }
}
