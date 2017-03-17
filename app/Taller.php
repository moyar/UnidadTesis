<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Taller extends Model
{
     protected $table = 'talleres';
    protected $primaryKey='id';
    public $timestamps=false;
   
  public function categorias()
    {
        return $this->hasMany('App\Categoria');
    }
  public function estudiantes()
    {
    	return $this->belongsToMany('App\Estudiante','estudiante_taller');
    }
    
}
