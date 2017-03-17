<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Categoria extends Model
{
    protected $table = 'categoria';
     protected $primaryKey='id_categoria';
     public $timestamps=false;
     
    public function tallers()
    {
        return $this->hasMany('App\Taller');
    }

}
