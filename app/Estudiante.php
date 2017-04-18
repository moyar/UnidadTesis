<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Estudiante extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $table='estudiantes';
    protected $primaryKey='id_user';
    public $timestamps=false;

    public function tutorias()
    {
    	return $this->belongsToMany('App\Tutoria','estudiante_tutoria');
    }
    public function talleres()
    {
        return $this->belongsToMany('App\Taller','estudiante_taller');
    }
    public function estudiante_fechas()
    {
        return $this->hasMany('App\Estudiante_fecha');
    }

    public function comentarios()
    {
        return $this->hasMany('App\Comentario');
    }
    
}
