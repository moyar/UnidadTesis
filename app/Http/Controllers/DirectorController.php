<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
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
use App\User;
use Session;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Auth;
use Response;
use DB;


class DirectorController extends Controller
{
	public function __construct()
    {
        $this->middleware('auth');
        
    }

    public function index(Request $request)
    {
        //$estudiantes = Estudiante::all();
        $usuario = Auth::user()->carrera_id;
        

        if ($request)
        {
            $query=trim($request->get('searchText'));
           
             $usuarios = Estudiante::where('carrera_id','=',$usuario)->where('activo','=',1)->orderBy('id_user', 'desc')
                         ->where('nombre','LIKE','%'.$query.'%')
                         ->orwhere('rut','LIKE','%'.$query.'%')->where('carrera_id','=',$usuario)->where('activo','=',1)
                         ->orwhere('apellidos','LIKE','%'.$query.'%')->where('carrera_id','=',$usuario)->where('activo','=',1)
                         ->orwhere('email','LIKE','%'.$query.'%')->where('carrera_id','=',$usuario)->where('activo','=',1)
            ->paginate(10);
          
           


            return view('director.estudiante.index',["usuarios"=>$usuarios,"searchText"=>$query]);
        }
    }
   
  


    public function show($id)
    {
        return view("director.estudiante.show",["usuarios"=>Estudiante::findOrFail($id)]);
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

       
     return view('director.estudiante.datos',compact('estudiante','talleres','asis','asis2','estFinal','estFinal2','fecha_tutoria','fecha_estudiante','tutorias','$id_user'));
     

    }   

    public function perfil(){
        $usuario_actual = Auth::user()->id;
        $usu = User::find(Auth::user()->id);
        //dd($usu->roles->nombre);

        return view('director.perfil.datos', compact('usu'));
     }

     public function perfilu(Request $request,$id){

        $user = User::whereId($id)->firstOrFail();
        $user->name = $request->get('name');
        $user->apellidos = $request->get('apellidos');
        $user->rut = $request->get('rut');
        $user->email = $request->get('email');
        $password = $request->get('password');

        if ($password != "") {
            $user->password = Hash::make($password);
        }
        
         $user->telefono = $request->get('telefono');
        $user->save();
       // $user->saveRoles($request->get('role'));

        return redirect(action('DirectorController@perfil'))->with('status', 'El Usuario ha sido modificado!');
     } 
}
