<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTableContratto extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('contratto', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->date('dataStipula');
            $table->unsignedBigInteger('studente_id');
            $table->foreign('studente_id')->references('id')->on('users');
            $table->unsignedBigInteger('locatore_id');
            $table->foreign('locatore_id')->references('id')->on('users');
            $table->unsignedBigInteger('offerta_id');
            $table->foreign('offerta_id')->references('id')->on('offerta');
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
        Schema::dropIfExists('table_contratto');
    }
}
