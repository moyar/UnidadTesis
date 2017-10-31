<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

use App\Topico;
use App\Tutoria;
use Illuminate\Support\Facades\Redirect;
use App\User;
use App\Profesor;
use Auth;
use DB;

use Mail;

class TopicoController extends Controller
{
      public function __construct()
    {
        $this->middleware('auth');
  
    }
    public function ver(Request $r){
    	$tutoria = Tutoria::find($r->id);
    
    	return view('profesor.tutoria.vertopico.topico',compact('tutoria'));	
    }


    public function store (Request $r){

        $tutoria = Tutoria::find($r->tutoriaId);
        $tutor = User::where('id','=',$tutoria->tutores_id)->first();
        $asignaturas = $tutoria->asignaturas->nombre;
        $usuario = Auth::user();
        $f = "$usuario->name $usuario->apellidos";


        $topico = new Topico();
        $topico->autor = $f;
        $topico->nombre = $r->nombre;
        $topico->tutorias()->associate($tutoria);
        $topico->save();

        $mensaje = "Estimado Tutor(a) $tutor->name $tutor->apellidos le comunico a ud,   que se ha creado un nuevo tema en la tutoria $asignaturas grupo $tutoria->nombre_grupo, por lo que ha sido enviada una alerta para su 
                        conocimiento.";

        $data = array(
            'email' => 'plataformaUAAEP@gmail.com',
            'to'    => $tutor->email,
            'subject' => "Se ha creado un nuevo tema en $asignaturas $tutoria->nombre_grupo",
            'bodyMessage' => $mensaje 
            );

        Mail::send('profesor.correoP', $data, function($message) use ($data){
            $message->from($data['email']);
            $message->to($data['to']);
            $message->subject($data['subject']);
        });

        return Redirect::to(action('TopicoController@ver',$r->tutoriaId));
    }
      public function edit(Request $r,$id)
    {
        $comment = Topico::find($id);
        return view('profesor/tutoria/vertopico/editT')->withComment($comment);
    }

  
    public function update(Request $request, $id)
    {
        //$estudiante = Estudiante::find($request->estudianteId);
       
        $comment = Topico::find($id);
        $comment->nombre = $request->nombre;
        $comment->save();
       return Redirect::to(action('TopicoController@ver',$request->tutoriaId));
    }
    public function eliminar(Request $r, $id){

    	

        $comment = Topico::find($id);
        $comment->delete();
        
    
       return Redirect::to(action('TopicoController@ver',$r->tutoriaId));
    }

    public function verd(Request $r){
        $tutoria = Tutoria::find($r->id);
    
        return view('tutor.tutoria.vertopico.topico',compact('tutoria'));   
    }
    public function stored (Request $r){

        $tutoria = Tutoria::find($r->tutoriaId);
        $profesor = User::where('id','=',$tutoria->profesor_id)->first();
       // dd($estudiante);

        $usuario = Auth::user();
        $f = "$usuario->name $usuario->apellidos";
        $asignaturas = $tutoria->asignaturas->nombre;

        $topico = new Topico();
        $topico->autor = $f;
        $topico->nombre = $r->nombre;
        $topico->tutorias()->associate($tutoria);
        $topico->save();


        $mensaje = "Estimado Profesor(a) $profesor->name $profesor->apellidos le comunico a ud,   que se ha creado un nuevo tema en la tutoria $asignaturas grupo $tutoria->nombre_grupo, por lo que ha sido enviada una alerta para su 
                        conocimiento.";

        $data = array(
            'email' => 'plataformaUAAEP@gmail.com',
            'to'    => $profesor->email,
            'subject' => "Se ha creado un nuevo tema en $asignaturas $tutoria->nombre_grupo",
            'bodyMessage' => $mensaje 
            );

        Mail::send('tutor.correoT', $data, function($message) use ($data){
            $message->from($data['email']);
            $message->to($data['to']);
            $message->subject($data['subject']);
        });

        return Redirect::to(action('TopicoController@verd',$r->tutoriaId));
    }
      public function editd(Request $r,$id)
    {
        $comment = Topico::find($id);
        return view('tutor/tutoria/vertopico/editT')->withComment($comment);
    }

  
    public function updated(Request $request, $id)
    {
        //$estudiante = Estudiante::find($request->estudianteId);
       
        $comment = Topico::find($id);
        $comment->nombre = $request->nombre;
        $comment->save();
       return Redirect::to(action('TopicoController@verd',$request->tutoriaId));
    }
    public function eliminard(Request $r, $id){

    	

        $comment = Topico::find($id);
        $comment->delete();
        
    
       return Redirect::to(action('TopicoController@verd',$r->tutoriaId));
    }
    

}
