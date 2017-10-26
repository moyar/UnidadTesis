<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Atencion extends Model
{
	 protected $table = 'atencion';
     protected $primaryKey='id_atencion';
    public function estudiantes()
    {
    	return $this->belongsTo('App\Estudiante','estudiante_id');
    }
}
