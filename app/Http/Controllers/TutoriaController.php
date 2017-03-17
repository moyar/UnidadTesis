<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use App\Tutoria;
use App\Tutor;
use App\Estudiante;
use App\Asignatura;
use App\Asistencia;
use App\Fecha_Tutoria;

use Session;
use DB;
use Illuminate\Support\Collection;
use Response;
class TutoriaController extends Controller
{

	 public function __construct(Request $request) {
      
    }
    public function index()
    {
        $tutores = Tutor::all();
        $tutorias = Tutoria::orderBy('id', 'desc')->paginate(10);
     

        return view('administracion.tutoria.index')->withTutorias($tutorias)->withTutores($tutores);
    }
     public function create()
    {
        $asignaturas = Asignatura::all();
        $estudiantes = Estudiante::all();
        $tutores = Tutor::all();
        return view('administracion.tutoria.create')->with('tutores',$tutores)->with('asignaturas',$asignaturas)->with('estudiantes',$estudiantes);

    }




     public function store(Request $request)
    {
      

        // store in the database
        $tutoria = new Tutoria;

        $tutoria->nombre_grupo = $request->nombre_grupo;
        $tutoria->asignaturas_id = $request->asignaturas_id;
        $tutoria->tutores_id = $request->tutores_id;
        $tutoria->save();
        $tutoria->estudiantes()->sync($request->tags);
    
        //$user->tasks()->attach('Aquí id task',['menu_id'=>'id menu', 'status'=>true]);
        return Redirect::to('administracion/tutoria');
    }



    public function show($id)
    {
        $tutorias = Tutoria::find($id);
        
        return view('administracion.tutoria.show')->withTutoria($tutorias);
    }

    public function mostrarGestionar($id){

         $tutorias = Tutoria::find($id);
         $estudiantes =Tutoria::find($id)->estudiantes()->orderBy('nombre')->get();
        // //dd($tutorias);
      
         // return view('administracion.tutoria.asistencia.crear')->with('estudiantes',$estudiantes)->with('tutorias',$tutorias);
         return view('administracion.tutoria.gestionar', compact('tutorias', 'estudiantes','id'));

    }



       public function crear($id)
    {
        // //$tutorias = Tutoria::with('estudiantes')->get();
         $tutorias = Tutoria::find($id);
         $estudiantes =Tutoria::find($id)->estudiantes()->orderBy('nombre')->get();
        // //dd($tutorias);
      
         // return view('administracion.tutoria.asistencia.crear')->with('estudiantes',$estudiantes)->with('tutorias',$tutorias);
         return view('administracion.tutoria.asistencia.crear', compact('tutorias', 'estudiantes','id'));
        //echo $estudiantes;

    }



    public function edit($id)
    {
        // find the post in the database and save as a var
        $tutorias = Tutoria::find($id);
        $asignaturas = Asignatura::all();
        $tutores = Tutor::all();
        $asig = array();
        foreach ($asignaturas as $asignatura) {
            $asig[$asignatura->id_asignatura] = $asignatura->nombre;
        }
        $tut = array();
        foreach ($tutores as $tutor) {
            $tut[$tutor->id_tutor] = $tutor->nombre;
        }



        $estudiantes = Estudiante::all();
        $estu = array();
        foreach ($estudiantes as $estudiante) {
            $estu[$estudiante->id_user] = $estudiante->nombre;
        }



        // return the view and pass in the var we previously created
        return view('administracion.tutoria.edit')->withTutorias($tutorias)->withAsignaturas($asig)->withTutores($tut)->withEstudiantes($estu);
    }

    public function update(Request $request, $id)
    {
        // store in the database
        $tutorias = Tutoria::find($id);

        $tutorias->nombre_grupo = $request->nombre_grupo;
        $tutorias->asignaturas_id = $request->asignaturas_id;
        $tutorias->tutores_id = $request->tutores_id;
        $tutorias->save();


        if (isset($request->tags)) {
            $tutorias->estudiantes()->sync($request->tags);
        } else {
            $tutorias->estudiantes()->sync(array());
        }
        
       // // $post = Tutoria::with('estudiantes')->find($id);
       //  $estudiantes = $tutorias->estudiantes->toArray();
       // // $impTags = implode(',',array_flatten($estudiantes));

       //  $asistencia = new Asistencia();
       //  $asistencia->fecha = 'fecha1';
       //  $asistencia->estado = 'presente';
       //  $asistencia->tutorias()->associate($tutorias->estudiantes->toArray());

        //$asistencia->save();





        //dd($asistencia->tutorias()->associate($tutorias));


        // set flash data with success message

        // redirect with flash data to posts.show
         return Redirect::to('administracion/tutoria');
    }
      public function destroy($id)
    {
        $tutorias = Tutoria::find($id);
        $tutorias->estudiantes()->detach();

        $tutorias->delete();

        
        return Redirect::to('administracion/tutoria');
    }

    public function nuevaAsistencia(Request $r){

        $tutoria = Tutoria::find($r->tutoriaId);

        $fecha_tutoria= new Fecha_Tutoria;
        $fecha_tutoria->fecha = $r->get('fecha');
        $fecha_tutoria->periodo = $r->get('periodo');
        //$fecha_tutoria->tutoria_id=$r->get('tutoriaId');
        $fecha_tutoria->tutorias()->associate($tutoria);
                                               
        $fecha_tutoria->save();


        
    }

}
