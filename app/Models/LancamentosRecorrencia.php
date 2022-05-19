<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LancamentosRecorrencia extends Model
{
    use HasFactory;

    protected $table = 'lancamento_recorrencia';

    protected $fillable = [
        'recorrencia_parcela',
        'recorrencia_data',
        'recorrencia_valor_pago'
    ];

    public function getLancamentos()
    {
        return $this->belongsTo(Lancamentos::class, 'id_lancamento', 'id');
    }
}
