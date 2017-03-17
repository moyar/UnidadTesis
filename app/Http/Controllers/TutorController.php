<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Http\Requests;
use App\Tutor;
use Session;
use Illuminate\Support\Facades\Redirect;
use DB;




class TutorController extends Controller
{
    public function __construct()
    {

    }
    public function index(Request $request)
    {
        if ($request)
        {
            $query=trim($request->get('searchText'));
            $tutores=DB::table('tutores')
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
           
            ->orderBy('id_tutor','desc')
            ->paginate(10);
            return view('administracion.tutor.index',["tutores"=>$tutores,"searchText"=>$query]);
        }
    }
    public function create()
    {
        return view("administracion.tutor.create");
    }
    public function store (Request $request)
    {
        $tutores=new Tutor;
        $tutores->rut=$request->get('rut');
        $tutores->nombre=$request->get('nombre');
        $tutores->apellidos=$request->get('apellidos');
        $tutores->estado='Activo';
        $tutores->telefono=$request->get('telefono');
        $tutores->email=$request->get('email');
        $tutores->save();
        return Redirect::to('administracion/tutor');
    }


    public function show($id)
    {
        return view("administracion.tutor.show",["tutores"=>Tutor::findOrFail($id)]);
    }
    public function edit($id)
    {
        return view("administracion.tutor.edit",["tutores"=>Tutor::findOrFail($id)]);
    }

    public function update(Request $request,$id)
    {
        $tutores=Tutor::findOrFail($id);
        $tutores->rut=$request->get('rut');
        $tutores->nombre=$request->get('nombre');
        $tutores->apellidos=$request->get('apellidos');

        $tutores->telefono=$request->get('telefono');
        $tutores->email=$request->get('email');
        $tutores->update();
        return Redirect::to('administracion/tutor');
    }
    public function destroy($id)
    {
        $tutores=Tutor::findOrFail($id);
       // $usuarios->delete();
        $tutores->estado='inactivo';
        $tutores->update();
        return Redirect::to('administracion/tutor');
    }

}
