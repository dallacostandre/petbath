<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTableLancamentos extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('lancamentos', function (Blueprint $table) {
            $table->id();
            $table->string('unique_user', '255');
            $table->integer('lancamento_natureza');
            $table->mediumText('lancamento_descricao', '255');
            $table->string('lancamento_tipo_recebimento_pagamento', '255');
            $table->double('lancamento_valor_previsto');
            $table->date('lancamento_data_prevista', '255');
            $table->mediumText('lancamento_categoria', '255');
            $table->timestamps();
        });

        Schema::create('lancamento_recorrencia', function (Blueprint $table) {
            $table->id();
            $table->integer('recorrencia_parcela');
            $table->date('recorrencia_data', '255');
            $table->double('recorrencia_valor_pago');
            $table->unsignedBigInteger('id_lancamento');
            $table->timestamps();
        });

        Schema::table('lancamento_recorrencia', function (Blueprint $table) {
            $table->foreign('id_lancamento')->references('id')->on('lancamentos')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('lancamentos');
    }
}
