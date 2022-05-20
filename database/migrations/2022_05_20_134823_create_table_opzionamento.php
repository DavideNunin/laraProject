<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTableOpzionamento extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('opzionamento', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->date('data');
            $table->unsignedBigInteger('offerta_id'); 
            $table->foreign('offerta_id')->references('id')->on('offerta');  
            $table->string('user_id'); 
            $table->foreign('user_id')->references('username')->on('utente');  
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
        Schema::dropIfExists('table_opzionamento');
    }
}
