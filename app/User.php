<?php

namespace App;
use Auth;

use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
   
 
    protected $primaryKey='id';
    public $timestamps=false;


   protected $fillable = [
        'name', 'email', 'password',
    ];
    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    protected $table = 'users';

     public function carreras(){
        return $this->belongsTo('App\Carrera','carrera_id');
    }

    public function roles(){
        return $this->belongsTo('App\Rol','rol_id');
    }


   
}
