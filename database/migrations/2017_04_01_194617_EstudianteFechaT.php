<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class EstudianteFechaT extends Migration
{
    public function up()
    {
          Schema::create('estudiante_fechaT', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('estado')->nullable();
            $table->integer('estudiante_id')->unsigned()->index();
            $table->foreign('estudiante_id')->references('id_user')->on('estudiantes')->onDelete('cascade');


            $table->integer('fecha_id')->unsigned()->index();
            $table->foreign('fecha_id')->references('id_t')->on('fecha_taller')->onDelete('cascade');



        });     }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        schema::drop('estudiante_fechaT');
  }
}
