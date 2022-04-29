<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AlterPetDadosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('pet_dados', function(Blueprint $table)
        {
            $table->string('pet_genero', '500')->change();
            $table->string('pet_especie', '500')->change();
            $table->string('pet_nome', '500')->change();
            $table->string('pet_raca', '900')->change();
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
