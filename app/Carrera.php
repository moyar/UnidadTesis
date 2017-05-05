<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Carrera extends Model
{
     protected $table = 'carrera';
     protected $primaryKey='id';
     public $timestamps=false;

     public function estudiantes()
    {
    	return $this->hasMany('App\Estudiante');
    }
}
