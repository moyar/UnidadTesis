<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class FechaTaller extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
         Schema::create('fecha_taller', function (Blueprint $table) {
            $table->increments('id_t');
            $table->date('fecha')->nullable();
            $table->integer('periodo');
            $table->string('estado');
            $table->integer('taller_id')->unsigned()->index();
            $table->foreign('taller_id')->references('id')->on('taller')->onDelete('cascade');
        }); 
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        schema::drop('fecha_taller'); 
    }
}
