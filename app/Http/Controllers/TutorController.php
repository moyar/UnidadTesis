<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Http\Requests;
use App\Tutor;
use App\Carrera;
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
            
              $tutores = Tutor::orderBy('id_tutor', 'desc')
            ->where('nombre','LIKE','%'.$query.'%')          
            ->orwhere('rut','LIKE','%'.$query.'%')            
            ->orwhere('apellidos','LIKE','%'.$query.'%')           
            ->orwhere('telefono','LIKE','%'.$query.'%')            
            ->orwhere('email','LIKE','%'.$query.'%') 
            ->paginate(10);


            return view('administracion.tutor.index',["tutores"=>$tutores,"searchText"=>$query]);
        }
    }
    public function create()
    {
        $carrera = Carrera::all();
       // dd($carrera);
        //return view("administracion.estudiante.create")->withCarrera('carrera',$carrera);
        return view('administracion.tutor.create', compact('carrera'));
    }
    public function store (Request $request)
    {
        $carrera = Carrera::find($request->carrera_id);
        $tutores=new Tutor;
        $tutores->rut=$request->get('rut');
        $tutores->nombre=$request->get('nombre');
        $tutores->apellidos=$request->get('apellidos');
        $tutores->telefono=$request->get('telefono');
        $tutores->email=$request->get('email');
        $tutores->carreras()->associate($carrera);  
        $tutores->sexo=$request->get('genero');
        $tutores->save();
        return Redirect::to('administracion/tutor');
    }


    public function show($id)
    {
        return view("administracion.tutor.show",["tutores"=>Tutor::findOrFail($id)]);
    }
    public function edit($id)
    {

        $carreras = Carrera::all();
        $tutores = Tutor::find($id);
        
        $carre = array();
        foreach ($carreras as $carrer) {
            $carre[$carrer->id] = $carrer->nombre;

        }
        
         return view('administracion.tutor.edit')->withTutores($tutores)->withCarre($carre);


        
    }

    public function update(Request $request,$id)
    {
        $tutores=Tutor::findOrFail($id);
        $tutores->rut=$request->get('rut');
        $tutores->nombre=$request->get('nombre');
        $tutores->apellidos=$request->get('apellidos');
        $tutores->telefono=$request->get('telefono');
        $tutores->email=$request->get('email');
        $tutores->carrera_id = $request->carrera_id;
        $tutores->sexo=$request->get('genero');
        $tutores->update();
        return Redirect::to('administracion/tutor');
    }
    public function destroy($id)
    {
        $tutores=Tutor::findOrFail($id);
        $tutores->delete();
       
        return Redirect::to('administracion/tutor');
    }

}
