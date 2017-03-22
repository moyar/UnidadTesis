<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Estudiante_fecha extends Model
{
    
   protected $table = 'estudiante_fecha';
   protected $primaryKey='id';
    public $timestamps=false;

   public function estudiantes(){

   	    	return $this->belongsTo('App\Estudiante','estudiante_id');

   }
    public function fecha_tutorias(){

   	    	return $this->belongsTo('App\Fecha_tutoria','fecha_id');

   }

 }
