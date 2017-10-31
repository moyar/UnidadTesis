<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

use App\Tutoria;
use App\Tutor;
use App\Estudiante;
use App\Asignatura;
use App\Asistencia;
use App\Fecha_tutoria;
use App\Estudiante_fecha;
use App\User;
use Session;
use DB;
use Illuminate\Support\Collection;
use Response;
use Auth;

use Mail;

class ProfesorController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
       
    }

    public function index(Request $request)
    {
       
         $usuario = Auth::user()->id;

        if ($request)
        {
            $query=trim($request->get('searchText'));
           
             $tutorias = Tutoria::where('profesor_id','=',$usuario)->orderBy('id', 'desc')
                         ->where('nombre_grupo','LIKE','%'.$query.'%')
                         ->orwhere('semestre','LIKE','%'.$query.'%')->where('profesor_id','=',$usuario)
                         ->orwhere('año','LIKE','%'.$query.'%')->where('profesor_id','=',$usuario)
            ->paginate(10);

           return view('profesor.tutoria.index',["tutorias"=>$tutorias,"searchText"=>$query]);
        }
    }
    




    public function show($id)
    {
        $tutorias = Tutoria::find($id);
        
        return view('profesor.tutoria.show')->withTutoria($tutorias);
    }

    public function mostrarGestionar($id){

         $tutorias = Tutoria::find($id);
         $estudiantes =Tutoria::find($id)->estudiantes()->orderBy('id_user')->get();
         return view('profesor.tutoria.gestionar', compact('tutorias', 'estudiantes','id'));

    }

    

   
    

    // public function nuevaAsistencia(Request $r){

    //     $tutoria = Tutoria::find($r->tutoriaId);

    //     $fecha_tutoria= new Fecha_Tutoria;
    //     $fecha_tutoria->fecha = $r->get('fecha');
    //     $fecha_tutoria->periodo = $r->get('periodo');
    //     //$fecha_tutoria->tutoria_id=$r->get('tutoriaId');
    //     $fecha_tutoria->tutorias()->associate($tutoria);
                                               
    //     $fecha_tutoria->save();


        
    // }


    public function ver($id){

         $tutorias = Tutoria::find($id);
         $estu =Tutoria::find($id)->estudiantes()->get();
         $fecha_tutoria =Fecha_tutoria::where('tutoria_id','=',$id)->get();
         $estFinal = array();
         $indice = 0;
         foreach ($fecha_tutoria as $a) {
                  $estudiantes= Estudiante_fecha::where('fecha_id','=',$a->id_f)->get();
                  $estFinal[$indice] = $estudiantes;
                  $indice+=1;
                  
      
               
        }
        //dd($estFinal);
      
        return view('profesor.tutoria.ver',compact('tutorias','estFinal','fecha_tutoria','estu'));
       
    }

     public function perfil(){
        $usuario_actual = Auth::user()->id;
        $usu = User::find(Auth::user()->id);
        //dd($usu->roles->nombre);

        return view('profesor.perfil.datos', compact('usu'));
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

        return redirect(action('ProfesorController@perfil'))->with('status', 'El Usuario ha sido modificado!');
     } 

  /*  public function correo(Request $r){

            $tutoria = Tutoria::find($r->tutoriaId);
            $asignatura= $tutoria->asignaturas->nombre;
            $estudiante = Estudiante::find($r->Id);
            $director = User::where('carrera_id','=',$estudiante->carrera_id)->first();
          
            //dd($r->ausente);
            $mensaje = "Estimado Director(a) $director->name $director->apellidos le comunico a ud,   que     el Alumno $estudiante->nombre 
                        $estudiante->apellidos, rut $estudiante->rut posee $r->ausente ausencias en la 
                        asignatura de $asignatura, por lo que ha sido enviada una alerta para su 
                        conocimiento.";
            
            
          $data = array(
            'email' => 'plataformaUAAEP@gmail.com',
            'to'    => $director->email,
            'subject' => "Ausencia tutorias de $asignatura",
            'bodyMessage' => $mensaje 
            );

        Mail::send('administracion.emailC', $data, function($message) use ($data){
            $message->from($data['email']);
            $message->to($data['to']);
            $message->subject($data['subject']);
        });
         return Redirect::to(action('TutoriaController@ver',$r->tutoriaId));
    }*/
}
