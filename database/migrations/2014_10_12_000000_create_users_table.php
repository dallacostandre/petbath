<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->string('email')->unique();
            $table->string('password');
            $table->string('unique_endereco', 255)->nullable();
            $table->string('unique_pet', 255)->nullable();
            $table->string('unique_user', 255)->nullable();
            $table->integer('user_telefone')->nullable();
            $table->integer('user_whats_app')->nullable();
            $table->string('user_foto', 255)->nullable();
            $table->string('user_cpf_cpnj', 50)->nullable();
            $table->string('user_responsavel', 50)->nullable();
            $table->timestamp('email_verified_at')->nullable();
            $table->rememberToken();
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
        Schema::dropIfExists('users');
    }
}
