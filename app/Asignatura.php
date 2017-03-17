<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Asignatura extends Model
{
     protected $table = 'asignaturas';
     protected $primaryKey='id_asignatura';
     public $timestamps=false;

    public function tutorias()
    {
    	return $this->belongsTo('App\Tutoria');
    }

 }
