<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Tutoria extends Model
{
    protected $table = 'tutorias';
    protected $primaryKey='id';
    public $timestamps=false;

    
    // protected $fillable = [
    //     'nombre_grupo','asignatura_id', 'tutores_id'
    // ];

    public function asignaturas()
    {
    	return $this->belongsTo('App\Asignatura');
    }

    public function estudiantes()
    {
    	return $this->belongsToMany('App\Estudiante','estudiante_tutoria');
    }
  //relacion tutores
     public function users()
    {
        return $this->belongsTo('App\User','tutores_id');
    }

     public function profesores()
    {
        return $this->belongsTo('App\User', 'profesor_id');
    }

    public function fecha_tutorias()
    {
        return $this->hasMany('App\fecha_tutoria');
    }

    public function topicos()
    {
        return $this->hasMany('App\Topico');
    }

    
}
