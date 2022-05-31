<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTableChat extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('chat', function (Blueprint $table) {
            $table->bigIncrements('id_chat')->unsigned()->index();
            $table->unsignedBigInteger('mittente');
            $table->unsignedBigInteger('destinatario');
            $table->unsignedBigInteger('messaggio');
            $table->foreign('mittente')->references('id')->on('users')->after('utente');
            $table->foreign('destinatario')->references('id')->on('users')->after('utente');
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
        Schema::dropIfExists('table_chat');
    }
}
