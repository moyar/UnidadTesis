<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Estudiante_fecha extends Model
{
    
   protected $table = 'estudiante_fecha';
   protected $primaryKey='id';

   public function estudiantes(){

   	    	return $this->belongsTo('App\Estudiante');

   }
    public function fecha_tutorias(){

   	    	return $this->belongsTo('App\Fecha_tutoria');

   }

 }
