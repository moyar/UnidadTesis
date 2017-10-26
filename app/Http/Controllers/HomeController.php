<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use Illuminate\Http\Request;
use App\Tutoria;
use App\Taller;
use App\Tutor;
use App\Estudiante;
use App\Asignatura;
use App\Asistencia;
use App\Fecha_tutoria;
use App\Estudiante_fecha;

use Session;
use DB;
use Illuminate\Support\Collection;
use Response;

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
        $tutores = Tutor::all()->count();
        $talleres = Taller::all()->count();
       
        return view('home', compact('tutorias', 'estudiante','tutores','talleres'));
    }
}
