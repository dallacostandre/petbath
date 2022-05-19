<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;

class Agendamento extends Model
{
    use HasFactory;
    
    protected $table = 'agendamento';
    
    protected $fillable = [        
        'unique_user',
        'id_pet',
        'id_cliente',
        'id_pacote',
        'id_servicos_evento',
        'title',
        'start',
        'end'
    ];

    public function getAgendamentosByUser()
    {
        $unique_user_id = new User();
        $agendamentos = Agendamento::where(['unique_user'=> $unique_user_id->getUserUniqueId()])->paginate(5);
        return $agendamentos;    
    }
}
