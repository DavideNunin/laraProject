<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDestinatarioTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('destinatario', function (Blueprint $table) {
            $table->unsignedBigInteger('destinatario');
            $table->foreign('destinatario')->references('id')->on('users');
            $table->unsignedBigInteger('messaggio');
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
        Schema::dropIfExists('destinatario');
    }
}
