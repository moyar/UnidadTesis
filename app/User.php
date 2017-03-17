<?php

namespace App;

use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $table='users';
    protected $primaryKey='id_user';
    protected $fillable = [
        'rut','nombre', 'apellidos','telefono','rol','email', 'password','estado','test','fecha_nacimiento','sexo','tipo_ingreso','año_ingreso','ciudad_procedencia','quintil',
        'nombre_apoderado','apellidos_apoderado','telefono_apoderado'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    protected $guarded =[

    ];
   
}
