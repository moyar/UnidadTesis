<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Topico extends Model
{
	 protected $table = 'topico';
     protected $primaryKey='id_topico';
       public function tutorias()
    {
    	return $this->belongsTo('App\Tutoria','tutoria_id');
    }

     public function respuestas()
    {
        return $this->hasMany('App\Respuesta');
    }
}
