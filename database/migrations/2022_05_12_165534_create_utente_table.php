<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUtenteTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->bigIncrements('id')->unsigned()->index();   
            $table->string('nome');
            $table->string('cognome');
            $table->string('username')->unique();
            //$table->primary('username');
            $table->date('data_nascita');
            $table->string('password');
            $table->string('tipologia', 1);
            $table->string('sesso',1);
            $table->string('telefono');
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
        Schema::dropIfExists('utente');
    }
}
