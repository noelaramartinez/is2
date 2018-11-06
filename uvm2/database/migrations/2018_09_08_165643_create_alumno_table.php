<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAlumnoTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //id	nombres	paterno	materno	cuenta	correo	telMovil	telFijo	status
        Schema::create('alumno', function (Blueprint $table) {
            $table->increments('id');
            $table->string('nombres', 100);
            $table->string('paterno', 100);
            $table->string('materno', 100);
            $table->string('pass', 12);
            $table->string('no_cuenta', 15)->unique();
            $table->string('e_mail', 100)->unique();
            $table->string('tel_movil', 15)->unique();
            $table->string('tel_fijo', 15);
            $table->boolean('status');
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
        Schema::dropIfExists('alumno');
    }
}
