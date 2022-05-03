<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AlterTableClientesEndereco extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('cliente_endereco', function (Blueprint $table) {
            $table->string('cliente_rua', '500')->nullable()->change();
            $table->string('cliente_numero', '10')->nullable()->change();
            $table->string('cliente_numero', '10')->nullable()->change();
            $table->string('cliente_bairro', '255')->nullable()->change();
            $table->string('cliente_complemento', '50')->nullable()->change();
            $table->string('cliente_cep', '12')->nullable()->change();
            $table->string('cliente_estado', '5')->nullable()->change();
            $table->string('cliente_cidade', '100')->nullable()->change();

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
