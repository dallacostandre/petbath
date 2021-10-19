<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AlterClienteEnderecoTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('cliente_endereco', function (Blueprint $table) {
            $table->renameColumn('user_rua','cliente_rua',)->change(); 
            $table->renameColumn('user_numero','cliente_numero',)->change();
            $table->renameColumn('user_bairro','cliente_bairro',)->change();
            $table->renameColumn('user_complemento','cliente_complemento',)->change();
            $table->renameColumn('user_cep','cliente_cep',)->change();
            $table->renameColumn('user_estado','cliente_estado',)->change();
            $table->renameColumn('user_cidade','cliente_cidade',)->change();
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
