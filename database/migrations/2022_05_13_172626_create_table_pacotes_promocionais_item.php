<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTablePacotesPromocionaisItem extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pacote_promocional', function (Blueprint $table) {
            $table->id();
            $table->string('unique_user', '255');
            $table->string('unique_pacote_promocional', '255');
            $table->string('pacote_nome', '255');
            $table->float('pacote_total_preco_sugerido');
            $table->float('pacote_total_preco_de_venda');
            $table->string('pacote_observacoes', '1000')->nullable();
            $table->timestamps();
        });

        Schema::create('pacote_promocional_item', function (Blueprint $table) {
            $table->id();
            $table->string('unique_pacote_promocional', '255');
            $table->string('unique_user', '255');
            $table->string('item_nome', '255');
            $table->integer('item_quantidade_total');
            $table->float('item_custo_unitario');
            $table->float('item_custo_total');
            $table->integer('item_porcentagem_desconto');
            $table->float('item_preco_final');
            $table->timestamps();
            $table->unsignedBigInteger('id_pacote_promocional');
        });

        Schema::table('pacote_promocional_item', function (Blueprint $table) {
            $table->foreign('id_pacote_promocional')->references('id')->on('pacote_promocional')->onDelete('cascade');
        });

        
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('table_pacotes_promocionais_item');
    }
}
