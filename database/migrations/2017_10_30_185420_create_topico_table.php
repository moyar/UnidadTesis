<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTopicoTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
         Schema::create('topico', function (Blueprint $table) {
            $table->increments('id_topico');
            $table->string('autor');
            $table->string('nombre'); 
            $table->integer('tutoria_id')->unsigned();
            $table->timestamps();

        }); 
          Schema::table('topico', function ($table){
            $table->foreign('tutoria_id')->references('id')->on('tutorias')->onDelete('cascade');
        });
     }    

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        schema::drop('topico');    }
}
