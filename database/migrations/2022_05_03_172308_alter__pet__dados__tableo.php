<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AlterPetDadosTableo extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('pet_dados', function (Blueprint $table) {
            $table->string('unique_cliente', '255')->nullable(false)->change();
            $table->string('pet_raca', '255')->nullable()->change();
            $table->string('pet_porte', '255')->nullable()->change();
            $table->string('pet_genero', '10')->nullable()->change();
            $table->string('pet_especie', '255')->nullable()->change();
            $table->string('pet_observacoes', '900')->nullable()->change();
            $table->string('pet_pelagem', '50')->nullable()->change();
            $table->dropColumn('pet_castracao')->change();
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
