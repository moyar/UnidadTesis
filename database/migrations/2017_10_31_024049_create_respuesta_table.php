<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateRespuestaTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('respuesta', function (Blueprint $table) {
            $table->increments('id_respuesta');
            $table->string('autor');
            $table->text('comentario');
            $table->integer('topico_id')->unsigned();
            $table->timestamps();

        }); 
          Schema::table('respuesta', function ($table){
            $table->foreign('topico_id')->references('id_topico')->on('topico')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        schema::drop('respuesta');
    }
}
