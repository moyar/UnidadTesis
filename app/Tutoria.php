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
     public function tutores()
    {
        return $this->belongsTo('App\Tutor');
    }

    public function fecha_tutorias()
    {
        return $this->hasMany('App\fecha_tutoria');
    }

    
}
