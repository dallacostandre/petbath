<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateClienteEnderecosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cliente_endereco', function (Blueprint $table) {
            $table->increments('id');
            $table->string('unique_endereço', 255);
            $table->string('user_rua', 500);
            $table->string('user_numero', 10);
            $table->string('user_bairro', 255);
            $table->string('user_complemento', 50);
            $table->string('user_cep', 10);
            $table->string('user_estado', 2);
            $table->string('user_cidade', 100);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('cliente_enderecos');
    }
}
