<?php

namespace Database\Seeders;

use App\Models\Agendamento;
use Illuminate\Database\Seeder;
use App\Models\Event;

class AddDummyEvent extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data = [
            [
                'unique_user' => '616a0cb09015e',
                'id_pet' => '616',
                'id_cliente' => '102',
                'id_pacote' => '12',
                'id_servicos_evento' => '5',
                'title' => 'Teste',
                'start' => '2021-07-12',
                'end' => '2021-07-12',
            ],
        ];
        foreach ($data as $key => $value) {
            Agendamento::create($value);
        }
    }
}
