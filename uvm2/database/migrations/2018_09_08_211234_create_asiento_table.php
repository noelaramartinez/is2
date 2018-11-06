<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAsientoTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('asiento', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('id_mesa');
            $table->foreign('id_mesa')->references('id')->on('mesa')->onUpdate('cascade');
            $table->unsignedInteger('id_silla');
            $table->foreign('id_silla')->references('id')->on('silla')->onUpdate('cascade');
            $table->unsignedInteger('id_reservacion');
            $table->foreign('id_reservacion')->references('id')->on('reservacion')->onUpdate('cascade');
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
        Schema::dropIfExists('asiento');
    }
}
