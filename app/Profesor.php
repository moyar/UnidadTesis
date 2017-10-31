<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Profesor extends Model
{
    public function tutorias(){
        return $this->hasMany('App\Tutoria');
    }
}
