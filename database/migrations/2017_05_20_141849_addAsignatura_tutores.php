<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddAsignaturaTutores extends Migration
{
    public function up()
    {
        Schema::table('tutores', function (Blueprint $table) {
            $table->integer('carrera_id')->nullable()->after('email')->unsigned();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('tutores', function (Blueprint $table) {
            $table->dropColumn('carrera_id');
        });
    }
}
