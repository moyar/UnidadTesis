<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Fecha_taller extends Model
{
   protected $table = 'fecha_taller';
   protected $primaryKey='id_t';
    public $timestamps=false;

   public function talleres(){

   	    	return $this->belongsTo('App\Tutoria','taller_id');

   }

   public function estudiante_fechats(){

   	    	return $this->hasMany('App\Estudiante_fechat');

   }}
