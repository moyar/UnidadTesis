<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Comentario extends Model
{
    public function estudiantes()
    {
    	return $this->belongsTo('App\Estudiante','estudiante_id');
    }
}
