<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use App\Tutoria;
use App\Tutor;
use App\Estudiante;
use App\Asignatura;
use App\Asistencia;
use App\Fecha_tutoria;
use App\Estudiante_fecha;
use App\User;
use App\Profesor;
use Session;
use DB;
use Illuminate\Support\Collection;
use Response;
use Auth;

use Mail;
class TutoriaController extends Controller
{

	public function __construct()
    {
        $this->middleware('auth');
       
    }

    public function index(Request $request)
    {
        // $tutores = Tutor::all();
        // $tutorias = Tutoria::orderBy('id', 'desc')->paginate(10);
        // return view('administracion.tutoria.index')->withTutorias($tutorias)->withTutores($tutores);


        if ($request)
        {
            $query=trim($request->get('searchText'));
           
            $tutorias = Tutoria::orderBy('id', 'desc')
            ->where('nombre_grupo','LIKE','%'.$query.'%')
            ->orwhere('semestre','LIKE','%'.$query.'%')
            ->orwhere('año','LIKE','%'.$query.'%')
            ->paginate(10);
            return view('administracion.tutoria.index',["tutorias"=>$tutorias,"searchText"=>$query]);
        }
    }
     public function create()
    {
        $asignaturas = Asignatura::all();
        $estudiantes = Estudiante::where('motivo','=',2)->where('activo','=',1)
                                    ->orwhere('motivo','=',3)->where('activo','=',1)->get();
        $tutores = User::where('rol_id','=', 4)->get();
        $profesores = User::where('rol_id','=', 3)->get();

      
        return view('administracion.tutoria.create')->with('tutores',$tutores)->with('asignaturas',$asignaturas)->with('estudiantes',$estudiantes)->with('profesores',$profesores);

    }

     public function store(Request $request)
    {
      
        $tutoria = new Tutoria;

        $tutoria->nombre_grupo = $request->nombre_grupo;
        $tutoria->asignaturas_id = $request->asignaturas_id;
        $tutoria->tutores_id = $request->tutores_id;
        $tutoria->dia = $request->dia;
        $tutoria->periodo = $request->periodo;
        $tutoria->semestre = $request->semestre;
        $tutoria->año = $request->año;
        $tutoria->profesor_id = $request->profesor_id;
        $tutoria->save();
        $tutoria->estudiantes()->sync($request->tags);
        return Redirect::to('administracion/tutoria');
    }



    public function show($id)
    {
        $tutorias = Tutoria::find($id);
        
        return view('administracion.tutoria.show')->withTutoria($tutorias);
    }

    public function mostrarGestionar($id){

         $tutorias = Tutoria::find($id);
         $estudiantes =Tutoria::find($id)->estudiantes()->orderBy('id_user')->get();
         return view('administracion.tutoria.gestionar', compact('tutorias', 'estudiantes','id'));

    }

       public function crear($id)
    {
        // //$tutorias = Tutoria::with('estudiantes')->get();
         $tutorias = Tutoria::find($id);
         $estudiantes =Tutoria::find($id)->estudiantes()->orderBy('id_user')->get();
         //$fecha_tutoria= DB::table('fecha_tutoria')->where('fecha_tutoria.tutoria_id','=',$id)->select('fecha_tutoria.tutoria_id');
         $fecha_tutoria=Fecha_tutoria::with('tutorias')->where('tutoria_id','=',$id)->orderBy('fecha','desc')->get();

         return view('administracion.tutoria.asistencia.crear', compact('tutorias', 'estudiantes','id','fecha_tutoria'));

    }



    public function edit($id)
    {
       
        $tutorias = Tutoria::find($id);
        $asignaturas = Asignatura::all();
        $tutores = User::where('rol_id','=', 4)->get();
        $profesores = User::where('rol_id','=', 3)->get();
        $asig = array();
        foreach ($asignaturas as $asignatura) {
            $asig[$asignatura->id_asignatura] = $asignatura->nombre;
        }
        $tut = array();
        foreach ($tutores as $tutor) {
            $nombre_completo = "$tutor->name $tutor->apellidos";
            $tut[$tutor->id] = $nombre_completo;
        }

         $prof = array();
        foreach ($profesores as $profe) {
            $nombre_completo = "$profe->name $profe->apellidos";
            $prof[$profe->id] = $nombre_completo;
        }

    

        $estudiantes =  Estudiante::where('motivo','=',2)->where('activo','=',1)
                                    ->orwhere('motivo','=',3)->where('activo','=',1)->get();
        $estu = array();
        foreach ($estudiantes as $estudiante) {
            $nombre = "$estudiante->nombre $estudiante->apellidos";
            $estu[$estudiante->id_user] = $nombre;
        }


        return view('administracion.tutoria.edit')->withTutorias($tutorias)->withAsignaturas($asig)->withTutores($tut)->withEstudiantes($estu)->withProf($prof);
    }

    public function update(Request $request, $id)
    {
        // store in the database
        $tutorias = Tutoria::find($id);

        $tutorias->nombre_grupo = $request->nombre_grupo;
        $tutorias->asignaturas_id = $request->asignaturas_id;
        $tutorias->tutores_id = $request->tutores_id;
        $tutorias->semestre = $request->semestre;
        $tutorias->dia = $request->dia;
        $tutorias->periodo = $request->periodo;
        $tutorias->año = $request->año;
         $tutorias->profesor_id = $request->profesor_id;
        $tutorias->save();


        if (isset($request->tags)) {
            $tutorias->estudiantes()->sync($request->tags);
        } else {
            $tutorias->estudiantes()->sync(array());
        }
        
       // // $post = Tutoria::with('estudiantes')->find($id);
       //  $estudiantes = $tutorias->estudiantes->toArray();
         return Redirect::to('administracion/tutoria');
    }
    
    public function destroy($id)
    {
        $tutorias = Tutoria::find($id);
        $tutorias->estudiantes()->detach();

        $tutorias->delete();

        
        return Redirect::to('administracion/tutoria');
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
    public function saveAlumno(Request $r){
        $tutoria = Tutoria::find($r->tutoriaID);
        $fecha_tutoria =Fecha_tutoria::find($r->fechaID);
        $estudiantes =Tutoria::find($r->tutoriaID)->estudiantes()->orderBy('id_user')->get();  
        
        $est = Estudiante_fecha::with('fecha_tutorias')->where('fecha_id','=',$r->fechaID)->select('fecha_id')->count();
        if($est>0){
            echo("tutoria realizada");

        }
        else{
            foreach ($estudiantes as $estudiante) {
           
            if($r->estado== null){
                    $fecha_tutoria->estado='Realizada';
                    $fecha_tutoria->save();
                    $estudiante_fecha = new Estudiante_fecha;
                    $estudiante_fecha->estado=0;
                    $estudiante_fecha->estudiantes()->associate($estudiante->id_user);
                    $estudiante_fecha->fecha_tutorias()->associate($fecha_tutoria);
                    $estudiante_fecha->save();


            }
            else{
                if (in_array($estudiante->id_user,$r->estado)){
                    
                    $estudiante_fecha = new Estudiante_fecha;
                    $estudiante_fecha->estado=1;
                    $estudiante_fecha->estudiantes()->associate($estudiante->id_user);
                    $estudiante_fecha->fecha_tutorias()->associate($fecha_tutoria);
                    $estudiante_fecha->save();
                    }
                else{
                    $estudiante_fecha = new Estudiante_fecha;
                    $estudiante_fecha->estado=0;
                    $estudiante_fecha->estudiantes()->associate($estudiante->id_user);
                    $estudiante_fecha->fecha_tutorias()->associate($fecha_tutoria);
                    $estudiante_fecha->save();
                }
                $fecha_tutoria->estado='Realizada';
                $fecha_tutoria->save();
            }

            }

        }

       return Redirect::to(action('TutoriaController@crear',$r->tutoriaID));
    }

    public function asisAlumno(Request $r, $id_f)
    {
        $fecha_tutoria=Fecha_tutoria::find($id_f);
        $tutorias=Tutoria::find($fecha_tutoria->tutoria_id);
        $estudiantes =Tutoria::find($fecha_tutoria->tutoria_id)->estudiantes()->orderBy('id_user')->get();      
       return view('administracion.tutoria.asistencia.asi', compact('tutorias', 'estudiantes','id_f','fecha_tutoria'));
    }


    public function eliminar(Request $r, $id_f)
    {
        
        $fecha_tutoria = Fecha_tutoria::find($id_f);
        $fecha_tutoria->delete();
        
    
        return Redirect::to(action('TutoriaController@crear',$r->tutoriaId));
  
        
    }

    public function editL($id_f){

        $fecha_tutoria = Fecha_tutoria::find($id_f);
        $tutorias= Tutoria::find($fecha_tutoria->tutoria_id);
        $estudiante_fecha = Estudiante_fecha::with('fecha_tutorias')->where('fecha_id','=',$id_f)->get();
        $estudiantes= Estudiante_fecha::with('estudiantes')->where('fecha_id','=',$id_f)->get();

        //dd($estudiantes);
         return view('administracion.tutoria.asistencia.edit', compact('tutorias', 'tem','estudiantes','id_f','fecha_tutoria'));
        
    }


    public function updateL(Request $r, $id_f){
        $estudiantes= Estudiante_fecha::with('estudiantes')->where('fecha_id','=',$id_f)->get();
      
           foreach ($estudiantes as $estudiante) {
           
            if($r->estado== null){
                    $estudiante->estado=0;
                    $estudiante->save();

            }
            else{
                if (in_array($estudiante->estudiante_id, $r->estado)){
                    $estudiante->estado=1;
                    $estudiante->save();
                    }
                else{
                    
                    $estudiante->estado=0;
                    $estudiante->save();
                }
                
            }

         }
        
            return Redirect::to(action('TutoriaController@crear',$r->tutoriaID));

    }
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
        
      
        return view('administracion.tutoria.ver',compact('tutorias','estFinal','fecha_tutoria','estu'));
       
    }

    public function correo(Request $r){

            $tutoria = Tutoria::find($r->tutoriaId);
            $asignatura= $tutoria->asignaturas->nombre;
            $estudiante = Estudiante::find($r->Id);
            $director = User::where('carrera_id','=',$estudiante->carrera_id)->first();
          
            //dd($r->ausente);
            $mensaje = "Estimado Director(a) $director->name $director->apellidos le comunico a ud,   que     el Alumno $estudiante->nombre 
                        $estudiante->apellidos, Rut $estudiante->rut posee $r->ausente ausencias en la 
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
    }


   
}
