<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Http\Requests;

use App\Tutoria;
use App\Tutor;
use App\Estudiante;
use App\Asignatura;
use App\Asistencia;

use Session;
use DB;
use Illuminate\Support\Collection;
use Response;


class AsistenciaController extends Controller
{
    public function index()
    {
        $tutores = Tutor::all();
        $tutorias = Tutoria::orderBy('id', 'desc')->paginate(10);

        return view('administracion.asistencia.index')->withTutorias($tutorias)->withTutores($tutores);
    }
     public function create($id)
    {
        //$tutorias = Tutoria::with('estudiantes')->get();
         $tutorias = Tutoria::find($id)->first();
        $estudiantes =Tutoria::find($id)->estudiantes()->orderBy('nombre')->get();
        //dd($tutorias);
      
        return view('administracion.tutoria.asistencia.create')->with('estudiantes',$estudiantes)->with('tutorias',$tutorias);

    }
     public function store(Request $request, $tutoria_id)
    {
        $tutorias = Tutoria::find(2)->first();
        $estudiantes =Tutoria::find(2)->estudiantes()->orderBy('nombre')->get();
        //dd($tutorias);
      
        return view('administracion.asistencia.create')->with('estudiantes',$estudiantes)->with('tutorias',$tutorias);
        // $tutorias = Tutoria::find($tutoria_id);

        // $estudiantes = $tutorias->estudiantes()->toArray();

        // $asistencia = new Asistencia();
        // $asistencia->fecha = $request->fecha;
        // $asistencia->estado = $request->estado;
        // $asistencia->tutorias()->associate($tutorias);

        // $asistencia->save();
        
    }



}
