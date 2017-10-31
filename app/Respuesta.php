<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Respuesta extends Model
{
    protected $table = 'respuesta';
     protected $primaryKey='id_respuesta';

     public function topicos()
    {
    	return $this->belongsTo('App\Topico','topico_id');
    }
}
