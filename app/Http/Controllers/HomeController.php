<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use Illuminate\Http\Request;
use App\Tutoria;
use App\Taller;
use App\User;
use App\Tutor;
use App\Carrera;
use App\Estudiante;
use App\Asignatura;
use App\Asistencia;
use App\Fecha_tutoria;
use App\Estudiante_fecha;
use Illuminate\Support\Facades\Redirect;
use Session;
use DB;
use Illuminate\Support\Collection;
use Response;
use Mail;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
       // $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $estudiante = Estudiante::all()->count();
        $tutorias = Tutoria::all()->count();
        $tutores = User::where('rol_id','=','4')->count();
        $talleres = Taller::all()->count();
       
        return view('home', compact('tutorias', 'estudiante','tutores','talleres'));
    }

    public function editar(){
     
        $carrera = Carrera::all();
        return view('auth/datos',compact('carrera'));
    }
    public function store(Request $request)
    {
      

        
        $carrera = Carrera::find($request->carrera_id);
        $usuarios=new Estudiante;
        $usuarios->rut=$request->get('rut');
        $usuarios->nombre=$request->get('nombre');
        $usuarios->apellidos=$request->get('apellidos');
        $usuarios->telefono=$request->get('telefono');
        $usuarios->email=$request->get('email');
        $usuarios->carreras()->associate($carrera);    
        $usuarios->fecha_nacimiento=$request->get('fecha_nacimiento');
        $usuarios->sexo=$request->get('genero');
        $usuarios->tipo_ingreso=$request->get('ingreso');
        $usuarios->año_ingreso=$request->get('año_ingreso');
        $usuarios->ciudad_procedencia=$request->get('ciudadP');
        $usuarios->quintil=$request->get('quintil');
        $usuarios->nombre_apoderado=$request->get('nombresA');
        $usuarios->apellidos_apoderado=$request->get('apellidosA');
        $usuarios->telefono_apoderado=$request->get('telefonoA');
        $usuarios->activo = 0;
        $usuarios->motivo = $request->get('motivo');

        if($usuarios->motivo == 2 || $usuarios == 3){

             $director = User::where('carrera_id','=',$usuarios->carrera_id)->first();
            $nombre_alumno = "$usuarios->nombre  $usuarios->apellidos";
      
          if($usuarios->motivo == 2 ){
              $mensaje = "Estimado Director(a) $director->name $director->apellidos se comunica a ud,   que     el Alumno $nombre_alumno, Rut $usuarios->rut,  solicíto Tutorías a la UAAEP.";
            
            } 
            else{
                if($usuarios->motivo == 3 ){
                  $mensaje = "Estimado Director(a) $director->name $director->apellidos se comunica a ud,   que     el Alumno $nombre_alumno, Rut $usuarios->rut,  solicíto Tutorías y Atención Psicopedagógica a la UAAEP.";
                }
        }
              
          $data = array(
            'email' => 'plataformaUAAEP@gmail.com',
            'to'    => $director->email,
            'subject' => "Solicitudes a PlataformaUAAEP",
            'bodyMessage' => $mensaje 
            );

        Mail::send('administracion.emailC', $data, function($message) use ($data){
                $message->from($data['email']);
                $message->to($data['to']);
                $message->subject($data['subject']);
            });

        }

        
        $usuarios->save();
        return Redirect::to('home');
    }
}
