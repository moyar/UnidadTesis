<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

use App\Topico;
use App\Respuesta;
use App\user;
use App\Tutoria;
use App\Asignaturas;
use Auth;
use Illuminate\Support\Facades\Redirect;
use Mail;

class RespuestaController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('web');

        
    }

    public function ver(Request $r){

    	
    	$topico = Topico::find($r->id);
    	

    
    	return view('profesor.tutoria.comentario.respuesta',compact('topico'));	
    }

    public function store (Request $r){

        
    	
        $topico = Topico::find($r->topicoId);
        $tutoria = Tutoria::find($topico->tutoria_id);
        $tutor = User::find($tutoria->tutores_id);
        $asignaturas = $tutoria->asignaturas->nombre;
     

        $usuario = Auth::user();
        $f = "$usuario->name $usuario->apellidos";

      
        $respuesta = new Respuesta();
        $respuesta->autor = $f;
        $respuesta->comentario = $r->comentario;
        $respuesta->topicos()->associate($topico);
        $respuesta->save();



        $mensaje = "Estimado Tutor(a) $tutor->name $tutor->apellidos le comunico a ud,   que se ha creado una respuesta al tema $topico->nombre en la tutoria $asignaturas grupo $tutoria->nombre_grupo por el profesor $f, por lo que ha sido enviada una alerta para su 
                        conocimiento.";

        $data = array(
            'email' => 'plataformaUAAEP@gmail.com',
            'to'    => $tutor->email,
            'subject' => "Se ha respondido el tema $topico->nombre en $asignaturas $tutoria->nombre_grupo",
            'bodyMessage' => $mensaje 
            );

        Mail::send('profesor.correoP', $data, function($message) use ($data){
            $message->from($data['email']);
            $message->to($data['to']);
            $message->subject($data['subject']);
        });

        return Redirect::to(action('RespuestaController@ver',$r->topicoId));
    }
      public function edit(Request $r,$id)
    {
        $comment = Respuesta::find($id);

        
        return view('profesor/tutoria/comentario/editR')->withComment($comment);
    }

  
    public function update(Request $request, $id)
    {
        //$estudiante = Estudiante::find($request->estudianteId);
       
        $comment = Respuesta::find($id);
        $comment->comentario = $request->comentario;
        $comment->save();
       return Redirect::to(action('RespuestaController@ver',$request->topicoId));
    }
    public function eliminar(Request $r, $id){

    	

        $comment = Respuesta::find($id);
        $comment->delete();
        
    
       return Redirect::to(action('RespuestaController@ver',$r->topicoId));
    }


    public function verd(Request $r){

        
        $topico = Topico::find($r->id);
        

    
        return view('tutor.tutoria.comentario.respuesta',compact('topico')); 
    }

    public function stored (Request $r){

        
        
        $topico = Topico::find($r->topicoId);
        $tutoria = Tutoria::find($topico->tutoria_id);
        $profesor = User::find($tutoria->profesor_id);
        $asignaturas = $tutoria->asignaturas->nombre;
       // dd($estudiante);

        $usuario = Auth::user();
        $f = "$usuario->name $usuario->apellidos";


        $respuesta = new Respuesta();
        $respuesta->autor = $f;
        $respuesta->comentario = $r->comentario;
        $respuesta->topicos()->associate($topico);
        $respuesta->save();




        $mensaje = "Estimado Profesor(a) $profesor->name $profesor->apellidos le comunico a ud,   que se ha creado una respuesta al tema $topico->nombre en la tutoria $asignaturas grupo $tutoria->nombre_grupo por el tutor $f, por lo que ha sido enviada una alerta para su 
                        conocimiento.";

        $data = array(
            'email' => 'plataformaUAAEP@gmail.com',
            'to'    => $profesor->email,
            'subject' => "Se ha respondido el tema $topico->nombre en $asignaturas $tutoria->nombre_grupo",
            'bodyMessage' => $mensaje 
            );

        Mail::send('tutor.correoT', $data, function($message) use ($data){
            $message->from($data['email']);
            $message->to($data['to']);
            $message->subject($data['subject']);
        });

        return Redirect::to(action('RespuestaController@verd',$r->topicoId));
    }
      public function editd(Request $r,$id)
    {
        $comment = Respuesta::find($id);

        
        return view('tutor/tutoria/comentario/editR')->withComment($comment);
    }

  
    public function updated(Request $request, $id)
    {
        //$estudiante = Estudiante::find($request->estudianteId);
       
        $comment = Respuesta::find($id);
        $comment->comentario = $request->comentario;
        $comment->save();
       return Redirect::to(action('RespuestaController@verd',$request->topicoId));
    }
    public function eliminard(Request $r, $id){

        

        $comment = Respuesta::find($id);
        $comment->delete();
        
    
       return Redirect::to(action('RespuestaController@verd',$r->topicoId));
    }


}
