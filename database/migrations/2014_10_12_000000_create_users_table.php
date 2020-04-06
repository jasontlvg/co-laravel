<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

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
            $table->bigIncrements('id');
            $table->string('nombre');
            $table->string('apaterno');
            $table->string('amaterno');
            $table->smallInteger('edad');
            $table->string('sexo');
            $table->string('email')->unique();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('cargo');
            $table->string('jornada');
            $table->string('escolaridad');
            $table->unsignedBigInteger('departamento_id');
            $table->string('password');
            $table->foreign('departamento_id')->references('id')->on('departamentos')->onDelete('cascade');
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
