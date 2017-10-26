<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAtencionTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
          Schema::create('atencion', function (Blueprint $table) {
            $table->increments('id_atencion');
            $table->string('autor'); 
            $table->integer('citadas');
            $table->integer('asistidas');
            $table->string('diagnostico');
            $table->string('derivaciones');
            $table->text('observacion');
            $table->integer('estudiante_id')->unsigned();
            $table->timestamps();

        }); 
          Schema::table('atencion', function ($table){
            $table->foreign('estudiante_id')->references('id_user')->on('estudiantes')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropForeign(['estudiante_id']);
        Schema::drop('atencion');
    }
}
