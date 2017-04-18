<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Comentario extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
     public function up()
    {
        Schema::create('comentarios', function (Blueprint $table) {
            $table->increments('id');
            $table->string('nombre');
            $table->text('comentario');
            $table->integer('estudiante_id')->unsigned();
            $table->timestamps();
        });

        Schema::table('comentario', function ($table){
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
        Schema::drop('comentarios');

    }
}
