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
            $table->unsignedBigInteger('user_id');
            $table->foreign('offerta_id')->references('offerta_id')->on('offerta');
            $table->foreign('user_id')->references('id')->on('users');
            $table->unique(array('user_id','offerta_id'));
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
