<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Fecha_tutoria extends Model
{

   protected $table = 'fecha_tutoria';
   protected $primaryKey='id_f';
    public $timestamps=false;

   public function tutorias(){

   	    	return $this->belongsTo('App\Tutoria','tutoria_id');

   }

   public function estudiante_fechas(){

   	    	return $this->hasMany('App\Estudiante_fecha');

   }


}
