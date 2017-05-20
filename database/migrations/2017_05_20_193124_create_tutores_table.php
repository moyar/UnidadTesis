<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTutoresTable extends Migration
{
    public function up()
    {
          Schema::create('tutorest', function (Blueprint $table) {
            $table->increments('id_tutor');
            $table->string('rut');
            $table->string('nombre');
            $table->string('apellidos');
            $table->string('telefono');
            $table->string('email')->unique();
            $table->integer('carrera_id');
            $table->string('sexo');
           


           


        });    

         }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        schema::drop('tutorest');
  }
}
