<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Estudiantes extends Migration
{
  public function up()
    {
          Schema::create('estudiantes', function (Blueprint $table) {
            $table->increments('id');
            $table->string('rut');
            $table->string('nombre');
            $table->string('apellidos');
            $table->string('telefono');
            $table->string('email');
            $table->integer('carrera_id');
            $table->date('fecha_nacimiento');
            $table->string('sexo');
            $table->string('tipo_ingreso');
            $table->string('año_ingreso');
            $table->string('ciudad_procedencia');
            $table->string('quintil');
            $table->string('nombre_apoderado');
            $table->string('apellidos_apoderado');
            $table->string('telefono_apoderado');
         

        });    

   }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        schema::drop('estudiantes');
  }
}
