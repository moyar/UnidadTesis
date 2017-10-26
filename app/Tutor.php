<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Tutor extends Model
{
     /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
     protected $table = 'tutores';
     protected $primaryKey='id_tutor';
     public $timestamps=false;

    public function tutorias(){
        return $this->hasMany('App\Tutoria');
    }
    public function carreras(){
        return $this->belongsTo('App\Carrera','carrera_id');
    }
}



