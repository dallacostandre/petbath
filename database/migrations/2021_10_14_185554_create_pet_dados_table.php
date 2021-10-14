<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePetDadosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pet_dados', function (Blueprint $table) {
            $table->increments('id');
            $table->string('unique_pet', 255);
            $table->string('pet_nome', 100);
            $table->integer('pet_raca');
            $table->string('pet_porte', 100);
            $table->string('pet_genero', 100);
            $table->string('pet_especie', 100);
            $table->text('pet_observacoes');
            $table->string('pet_alergias', 255);
            $table->string('pet_foto', 255)->nullable();
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
        Schema::dropIfExists('pet_dados');
    }
}
