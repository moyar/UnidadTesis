<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

use Illuminate\Support\Facades\Redirect;
use App\Estudiante;
use App\Tutoria;
use App\Taller;
use App\Carrera;
use App\Estudiante_fecha;
use App\Estudiante_fechat;
use App\Fecha_tutoria;
use App\Fecha_taller;
use App\Categoria;
use App\Asignatura;
use App\Tutor;
use App\user;
use Session;
use Mail;
use Auth;

use Illuminate\Support\Collection;
use Response;
//use App\Http\Requests\EstudianteFormRequest;
use DB;

class DirectorNuevoController extends Controller
{
     public function index(Request $request)
    {
        //$estudiantes = Estudiante::all();
    	$usuario = Auth::user()->carrera_id;
        if ($request)
        {
            $query=trim($request->get('searchText'));

             $usuarios = Estudiante::where('carrera_id','=',$usuario)->where('activo','=',0)->where('aceptaTutoria','=',0)->orderBy('id_user', 'desc')
                         ->where('nombre','LIKE','%'.$query.'%')
                         ->orwhere('rut','LIKE','%'.$query.'%')->where('carrera_id','=',$usuario)->where('activo','=',0)->where('aceptaTutoria','=',0)
                         ->orwhere('apellidos','LIKE','%'.$query.'%')->where('carrera_id','=',$usuario)->where('activo','=',0)->where('aceptaTutoria','=',0)
                         ->orwhere('email','LIKE','%'.$query.'%')->where('carrera_id','=',$usuario)->where('activo','=',0)->where('aceptaTutoria','=',0)
            ->paginate(10);


            return view('director.nuevo.index',["usuarios"=>$usuarios,"searchText"=>$query]);
        }
    }

    public function store (Request $request)
    {
      	$usuarios= Estudiante::find($request->usuId);

      	
        $usuarios->aceptaTutoria = 1;
        $usuarios->save();


        
      
        return Redirect::to('director/nuevo');
    }

    public function edit($id)
    {
        $usuarios = Estudiante::find($id);
        
        
        return view('director.nuevo.edit')->withUsuarios($usuarios);
    }

    public function update(Request $request, $id)
    {
        
        $usuarios=Estudiante::findOrFail($id);
        
        $usuarios->motivo=$request->get('motivo');
        $usuarios->update();
        return Redirect::to('director/nuevo');
    }
    public function destroy($id)
    {
        
       $usuarios=Estudiante::findOrFail($id);
        $usuarios->aceptaTutoria = 2;
        $usuarios->save();
        return Redirect::to('director/nuevo');
    }

    
}
