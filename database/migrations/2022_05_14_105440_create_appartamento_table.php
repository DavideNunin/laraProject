<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAppartamentoTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('appartamento', function (Blueprint $table) {
            $table->bigIncrements('id')->unsigned()->index();   
            $table->boolean('loc_ricr');
            $table->integer('npostiletto');
            $table->integer('ncamere');
            $table->boolean('cucina');
            $table->integer('nbagni');
            $table->boolean('terrazzo');
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
        Schema::dropIfExists('appartamento');
    }
}
