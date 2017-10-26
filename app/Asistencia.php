<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Asistencia extends Model
{
    protected $table='asistencia';
    protected $primaryKey='id';
    public $timestamps=false;

    public function tutorias()
    {
    	return $this->belongsTo('App\Tutoria');
    }
    public function talleres()
    {
        return $this->belongsTo('App\Taller');
    }
}
