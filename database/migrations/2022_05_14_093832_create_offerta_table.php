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
            $table->bigIncrements('offerta_id')->unsigned()->index();   
            $table->string('via',40);
            $table->integer('ncivico');
            $table->string('genereRichiesto',1);
            $table->string('citta',40);
            $table->string('descrizione',700);
            $table->date('dataInizioLocazione');
            $table->string('titolo',50);
            $table->string('tipologia',1);
            $table->float('prezzo');
            $table->date('dataPubblicazione');
            $table->integer('etaRichiesta');
            $table->boolean('opzionabile')->default(true);
            $table->unsignedBigInteger('user_id');
            $table->foreign('user_id')->references('id')->on('users');
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
