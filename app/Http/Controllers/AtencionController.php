<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Estudiante;
use App\Atencion;
use Illuminate\Support\Facades\Redirect;
use DB;

class AtencionController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('web');

        
    }

    public function store (Request $r){
        $estudiante = Estudiante::find($r->estudianteId);
       // dd($estudiante);

        $atencion = new Atencion();
        $atencion->autor = $r->autor;
        $atencion->citadas = $r->citadas;
        $atencion->asistidas = $r->asistidas;
        $atencion->diagnostico = $r->diagnostico;
        $atencion->derivaciones = $r->derivaciones;
        $atencion->observacion = $r->observacion;
        $atencion->estudiantes()->associate($estudiante);
        $atencion->save();

        return Redirect::to(action('EstudianteController@datos',$r->estudianteId));
    }
      public function edit($id)
    {
       
       
        $aten = Atencion::find($id);
        return view('administracion/estudiante/editA')->withAten($aten);
    }

  
    public function update(Request $request, $id)
    {
        //$estudiante = Estudiante::find($request->estudianteId);
        $atencion = Atencion::find($id);
        
        $atencion->citadas = $request->citadas;
        $atencion->asistidas = $request->asistidas;
        $atencion->diagnostico = $request->diagnostico;
        $atencion->derivaciones = $request->derivaciones;
        $atencion->observacion = $request->observacion;
        $atencion->save();
        return Redirect::to(action('EstudianteController@datos',$request->estudianteId));
    }
    public function eliminar(Request $r, $id){

        $aten = Atencion::find($id);
        $aten->delete();
        
    
        return Redirect::to(action('EstudianteController@datos',$r->estudianteId));
    }


}
