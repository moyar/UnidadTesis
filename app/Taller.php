<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Taller extends Model
{
     protected $table = 'taller';
    protected $primaryKey='id';
    public $timestamps=false;
   
   public function categorias()
    {
      return $this->belongsTo('App\Categoria','categoria_id');
    }
  public function estudiantes()
    {
    	return $this->belongsToMany('App\Estudiante','estudiante_taller');
    }
     public function fecha_talleres()
    {
        return $this->hasMany('App\fecha_taller');
    }
}
