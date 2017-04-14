<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Http\Requests;
use App\Estudiante;
use Illuminate\Support\Facades\Redirect;
//use App\Http\Requests\EstudianteFormRequest;
use DB;



class EstudianteController extends Controller
{
    public function __construct()
    {

    }
    public function index(Request $request)
    {
        if ($request)
        {
            $query=trim($request->get('searchText'));
            $usuarios=DB::table('estudiantes')
            ->where('nombre','LIKE','%'.$query.'%')          
            ->orwhere('rut','LIKE','%'.$query.'%')            
            ->orwhere('apellidos','LIKE','%'.$query.'%')           
            ->orwhere('telefono','LIKE','%'.$query.'%')            
            ->orwhere('email','LIKE','%'.$query.'%') 
            ->orwhere('carrera','LIKE','%'.$query.'%')           
            ->orderBy('id_user','desc')
            ->paginate(10);
            return view('administracion.estudiante.index',["users"=>$usuarios,"searchText"=>$query]);
        }
    }
    public function create()
    {
        return view("administracion.estudiante.create");
    }
    public function store (Request $request)
    {
        $usuarios=new Estudiante;
        $usuarios->rut=$request->get('rut');
        $usuarios->nombre=$request->get('nombre');
        $usuarios->apellidos=$request->get('apellidos');
        $usuarios->telefono=$request->get('telefono');
        $usuarios->email=$request->get('email');
        $usuarios->carrera=$request->get('carrera');
        $usuarios->fecha_nacimiento=$request->get('fecha_nacimiento');
        $usuarios->sexo=$request->get('genero');
        $usuarios->tipo_ingreso=$request->get('ingreso');
        $usuarios->año_ingreso=$request->get('año_ingreso');
        $usuarios->ciudad_procedencia=$request->get('ciudadP');
        $usuarios->quintil=$request->get('quintil');
        $usuarios->nombre_apoderado=$request->get('nombresA');
        $usuarios->apellidos_apoderado=$request->get('apellidosA');
        $usuarios->telefono_apoderado=$request->get('telefonoA');
        $usuarios->save();
        return Redirect::to('administracion/estudiante');
    }


    public function show($id)
    {
        return view("administracion.estudiante.show",["usuarios"=>Estudiante::findOrFail($id)]);
    }
    public function edit($id)
    {
        return view("administracion.estudiante.edit",["usuarios"=>Estudiante::findOrFail($id)]);
    }

    public function update(Request $request,$id)
    {
        $usuarios=Estudiante::findOrFail($id);
        $usuarios->rut=$request->get('rut');
        $usuarios->nombre=$request->get('nombre');
        $usuarios->apellidos=$request->get('apellidos');
        $usuarios->telefono=$request->get('telefono');
        $usuarios->email=$request->get('email');
        $usuarios->carrera=$request->get('carrera');
        $usuarios->fecha_nacimiento=$request->get('fecha_nacimiento');
        $usuarios->sexo=$request->get('genero');
        $usuarios->tipo_ingreso=$request->get('ingreso');
        $usuarios->año_ingreso=$request->get('año_ingreso');
        $usuarios->ciudad_procedencia=$request->get('ciudadP');
        $usuarios->quintil=$request->get('quintil');
        $usuarios->nombre_apoderado=$request->get('nombresA');
        $usuarios->apellidos_apoderado=$request->get('apellidosA');
        $usuarios->telefono_apoderado=$request->get('telefonoA');
        $usuarios->update();
        return Redirect::to('administracion/estudiante');
    }
    public function destroy($id)
    {
        $usuarios=Estudiante::findOrFail($id);
       // $usuarios->delete();
        $usuarios->tutorias()->detach();
        $usuarios->delete();
        return Redirect::to('administracion/estudiante');
    }
}
