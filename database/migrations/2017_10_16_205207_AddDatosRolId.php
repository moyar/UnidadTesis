<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddDatosRolId extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
     public function up(){
        Schema::table('users', function (Blueprint $table) {
            $table->string('apellidos')->after('name'); 
            $table->string('rut')->after('apellidos');  
            $table->integer('carrera_id')->nullable()->after('rut')->unsigned();
            $table->integer('rol_id')->nullable()->after('password')->unsigned();
        });   

     }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        $table->dropColumn('carrera_id');
        $table->dropColumn('rol_id');
    }
}
