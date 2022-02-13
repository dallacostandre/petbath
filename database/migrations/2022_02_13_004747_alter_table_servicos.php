<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AlterTableServicos extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('servicos', function (Blueprint $table) {
            $table->string('servico_nome', 500);
            $table->string('servico_pet_raca', 500);
            $table->string('servico_pet_porte', 500);
            $table->string('servico_codigo', 500);
            $table->string('servico_custo', 500);
            $table->string('servico_porcentagem_lucro', 500);
            $table->string('servico_preco_de_venda', 500);
            $table->string('servico_lucro', 500);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
    }
}
