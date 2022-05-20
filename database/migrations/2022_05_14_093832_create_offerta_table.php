<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOffertaTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('offerta', function (Blueprint $table) {
            $table->bigIncrements('id')->unsigned()->index();   
            $table->string('via',25);
            $table->integer('ncivico');
            $table->string('genereRichiesto',1);
            $table->string('citta',15);
            $table->string('descrizione',50);
            $table->string('periodo',10);
            $table->string('titolo',20);
            $table->string('tipologia',1);
            $table->float('prezzo');
            $table->integer('etaRichiesta');
            $table->unsignedBigInteger('user_id');
            $table->foreign('user_id')->references('id')->on('utente');
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
        Schema::dropIfExists('offerta');
    }
}