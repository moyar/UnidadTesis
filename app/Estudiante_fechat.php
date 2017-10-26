<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Estudiante_fechat extends Model
{
   protected $table = 'estudiante_fechat';
   protected $primaryKey='id';
   public $timestamps=false;

   public function estudiantes(){

   	    	return $this->belongsTo('App\Estudiante','estudiante_id');

   }
    public function fecha_talleres(){

   	    	return $this->belongsTo('App\Fecha_taller','fecha_id');

   }}
