<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateRolesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
      public function up(){
          Schema::create('roles', function (Blueprint $table) {
            $table->increments('id_rol');
            $table->string('nombre');  

        });    

     }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
            schema::drop('roles');
    }
}
