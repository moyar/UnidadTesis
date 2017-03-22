<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Collection;
use App\Tutoria;
use App\Tutor;
use App\Estudiante;
use App\Asignatura;
use App\Asistencia;
use App\Fecha_tutoria;
use App\Estudiante_fecha;
use Session;
use Response;
use DB;

class FechaTutoriasController extends Controller
{
    
	public function nuevaAsistencia(Request $r){

	        $tutorias = Tutoria::find($r->tutoriaId);

	        $fecha_tutoria= new Fecha_Tutoria;
	        $fecha_tutoria->fecha = $r->get('fecha');
	        $fecha_tutoria->periodo = $r->get('periodo');
	        $fecha_tutoria->estado='No Realizada';
	        $fecha_tutoria->tutorias()->associate($tutorias);                                  
	        $fecha_tutoria->save();

	       return Redirect::to(action('TutoriaController@crear',$r->tutoriaId));
	        
	    }

	 	

}
