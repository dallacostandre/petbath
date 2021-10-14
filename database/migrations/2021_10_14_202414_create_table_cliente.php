<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTableCliente extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cliente', function (Blueprint $table) {
            $table->increments('id');
            $table->string('unique_pet', 255);
            $table->string('unique_user', 255);
            $table->string('unique_endereco', 255);
            $table->string('cliente_nome', 255);
            $table->string('cliente_email', 255)->nullable();
            $table->string('cliente_telefone', 255);
            $table->string('cliente_whatsapp', 255);
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
        Schema::dropIfExists('table_cliente');
    }
}
