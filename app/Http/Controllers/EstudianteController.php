<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Http\Requests;
use App\Estudiante;
use App\Tutoria;
use App\Taller;
use App\Estudiante_fecha;
use App\Estudiante_fechat;
use App\Fecha_tutoria;
use App\Fecha_taller;
use App\Categoria;
use App\Asignatura;
use App\Tutor;
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

    public function datos($id_user){
       $estudiante = Estudiante::find($id_user);
       //tutorias
       $tutorias=Estudiante::find($id_user)->tutorias()->get();
       $fecha_estudiante=Estudiante_fecha::where('estudiante_id','=',$id_user)->where('estado','=',1)->get();
       //dd($fecha_estudiante->count());
      $estFinal = array();
      $asis = array();
      $indice = 0;
      $indice2 = 0;
      
       foreach ($tutorias as $a) {
           $fecha_tutoria= Fecha_tutoria::where('tutoria_id','=',$a->id)->get();
           //dd($fecha_tutoria);
           $valor=$fecha_tutoria->count();
           $estFinal[$indice]=$valor;
           $indice = $indice + 1;
           $valor2=0;
           foreach ($fecha_tutoria as $b) {
              
              $fecha = Estudiante_fecha::where('fecha_id','=',$b->id_f)->where('estudiante_id','=',$id_user)->get();
              foreach ($fecha as $c) {
                 if($c->estado == 1){
                    $valor2 = $valor2 + 1;
                 } 
              }

           }
           $asis[$indice2] = $valor2;
           $indice2 = $indice2 + 1;     
       }
       //talleres

       $talleres=Estudiante::find($id_user)->talleres()->get();
       //dd($talleres); 
       $estFinal2 = array();
       $asis2 = array();
       $indice3 = 0;
       $indice4 = 0;  
     // dd($asis);
       foreach ($talleres as $a) {
           $fecha_taller= Fecha_taller::where('taller_id','=',$a->id)->get();
           //dd($fecha_tutoria);
           $valor3=$fecha_taller->count();
           $estFinal2[$indice3]=$valor3;
           $indice3 = $indice3 + 1;
           $valor4=0;
           foreach ($fecha_taller as $b) {
              
              $fecha2 = Estudiante_fechat::where('fecha_id','=',$b->id_t)->where('estudiante_id','=',$id_user)->get();
              foreach ($fecha2 as $c) {
                 if($c->estado == 1){
                    $valor4 = $valor4 + 1;
                 } 
              }

           }
           $asis2[$indice4] = $valor4;
           $indice4 = $indice4 + 1;     
       }

       
     return view('administracion.estudiante.datos',compact('estudiante','talleres','asis','asis2','estFinal','estFinal2','fecha_tutoria','fecha_estudiante','tutorias','$id_user'));
     

    }
}
