<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMittenteTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('mittente', function (Blueprint $table) {
            $table->unsignedBigInteger('utente');
            $table->unsignedBigInteger('messaggio');
            $table->foreign('utente')->references('id')->on('utente')->after('utente');
            $table->foreign('messaggio')->references('id')->on('messaggio');
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
        Schema::dropIfExists('mittente');
    }
}
