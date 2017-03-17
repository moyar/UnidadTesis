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
            ->where ('estado','=','Activo')
            ->orwhere('rut','LIKE','%'.$query.'%')
            ->where ('estado','=','Activo')
            ->orwhere('apellidos','LIKE','%'.$query.'%')
            ->where ('estado','=','Activo')
            ->orwhere('telefono','LIKE','%'.$query.'%')
            ->where ('estado','=','Activo')
            ->orwhere('email','LIKE','%'.$query.'%')
           ->where ('estado','=','Activo')
           
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
        $usuarios->estado='Activo';
        $usuarios->telefono=$request->get('telefono');
        $usuarios->email=$request->get('email');
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
        $usuarios->update();
        return Redirect::to('administracion/estudiante');
    }
    public function destroy($id)
    {
        $usuarios=Estudiante::findOrFail($id);
       // $usuarios->delete();
        $usuarios->tutorias()->detach();
        $usuarios->estado='inactivo';
        $usuarios->update();
        return Redirect::to('administracion/estudiante');
    }
}
