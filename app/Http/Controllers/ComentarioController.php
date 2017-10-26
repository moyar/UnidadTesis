<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Estudiante;
use App\Comentario;
use Illuminate\Support\Facades\Redirect;
use DB;

class ComentarioController extends Controller{
    
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('web');

        
    }

    public function store (Request $r){
        $estudiante = Estudiante::find($r->estudianteId);
       // dd($estudiante);

        $comentario = new Comentario();
        $comentario->nombre = $r->nombre;
        $comentario->comentario = $r->comentario;
        $comentario->estudiantes()->associate($estudiante);
        $comentario->save();

        return Redirect::to(action('EstudianteController@datos',$r->estudianteId));
    }
      public function edit($id)
    {
       
       
        $comment = Comentario::find($id);
        return view('administracion/estudiante/editC')->withComment($comment);
    }

  
    public function update(Request $request, $id)
    {
        //$estudiante = Estudiante::find($request->estudianteId);
        $comment = Comentario::find($id);
        $comment->comentario = $request->comentario;
        $comment->save();
        return Redirect::to(action('EstudianteController@datos',$request->estudianteId));
    }
    public function eliminar(Request $r, $id){

        $comment = Comentario::find($id);
        $comment->delete();
        
    
        return Redirect::to(action('EstudianteController@datos',$r->estudianteId));
    }



    public function stored (Request $r){
        $estudiante = Estudiante::find($r->estudianteId);
       // dd($estudiante);

        $comentario = new Comentario();
        $comentario->nombre = $r->nombre;
        $comentario->comentario = $r->comentario;
        $comentario->estudiantes()->associate($estudiante);
        $comentario->save();

        return Redirect::to(action('DirectorController@datos',$r->estudianteId));
    }
      public function editd($id)
    {
       
       
        $comment = Comentario::find($id);
        return view('director/estudiante/editC')->withComment($comment);
    }

  
    public function updated(Request $request, $id)
    {
        //$estudiante = Estudiante::find($request->estudianteId);
        $comment = Comentario::find($id);
        $comment->comentario = $request->comentario;
        $comment->save();
        return Redirect::to(action('DirectorController@datos',$request->estudianteId));
    }
    public function eliminard(Request $r, $id){

        $comment = Comentario::find($id);
        $comment->delete();
        
    
        return Redirect::to(action('DirectorController@datos',$r->estudianteId));
    }
}
