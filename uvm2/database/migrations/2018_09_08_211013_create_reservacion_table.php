<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateReservacionTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('reservacion', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('id_alumno');
            $table->foreign('id_alumno')->references('id')->on('alumno')->onUpdate('cascade');
            $table->dateTime('fecha_reservacion');
            $table->dateTime('fecha_limite');
            $table->dateTime('fecha_evento');
            $table->double('monto_total', 8, 2);
            $table->double('adeudo', 8, 2);
            $table->double('precio_unitario', 8, 2);
            $table->boolean('status');
            $table->tinyInteger('cantidad_asientos');
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
        Schema::dropIfExists('reservacion');
    }
}
