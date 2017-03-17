<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class FechaTutoria extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('fecha_tutoria', function (Blueprint $table) {
            $table->increments('id_f');
            $table->date('fecha')->nullable();
            $table->integer('periodo');
            $table->integer('tutoria_id')->unsigned()->index();
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
        schema::drop('fecha_tutoria');
   }
}
