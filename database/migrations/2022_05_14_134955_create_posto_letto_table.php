<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePostoLettoTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('posto_letto', function (Blueprint $table) {
            $table->bigIncrements('id')->unsigned()->index();
            $table->boolean('doppia');
            $table->boolean('luogoStudio');
            $table->boolean('finestra');
            $table->float('superficie');
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
        Schema::dropIfExists('posto_letto');
    }
}
