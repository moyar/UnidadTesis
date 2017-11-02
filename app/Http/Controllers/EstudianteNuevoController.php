<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;


use Illuminate\Support\Facades\Redirect;
use App\Estudiante;
use App\Tutoria;
use App\Taller;
use App\Carrera;
use App\Estudiante_fecha;
use App\Estudiante_fechat;
use App\Fecha_tutoria;
use App\Fecha_taller;
use App\Categoria;
use App\Asignatura;
use App\Tutor;
use App\user;
use Session;
use Mail;

use Illuminate\Support\Collection;
use Response;
//use App\Http\Requests\EstudianteFormRequest;
use DB;

class EstudianteNuevoController extends Controller
{
     public function index(Request $request)
    {
        //$estudiantes = Estudiante::all();

        if ($request)
        {
            $query=trim($request->get('searchText'));
            $usuarios = Estudiante::where('activo','=',0)->orderBy('id_user', 'desc')
                         ->where('nombre','LIKE','%'.$query.'%')
                         ->orwhere('rut','LIKE','%'.$query.'%')->where('activo','=',0)
                         ->orwhere('apellidos','LIKE','%'.$query.'%')->where('activo','=',0)
                         ->orwhere('telefono','LIKE','%'.$query.'%')->where('activo','=',0)
                         ->orwhere('email','LIKE','%'.$query.'%')->where('activo','=',0)
            ->paginate(10);


            return view('administracion.nuevo.index',["usuarios"=>$usuarios,"searchText"=>$query]);
        }
    }

    public function store (Request $request)
    {
      	$usuarios= Estudiante::find($request->usuId);

      	
        $usuarios->activo = 1;
        $usuarios->save();


        $director = User::where('carrera_id','=',$usuarios->carrera_id)->first();
          
            //dd($r->ausente);
            $mensaje = "Estimado Director(a) $director->name $director->apellidos se comunica a ud,   que     el Alumno $usuarios->nombre 
                        $usuarios->apellidos, Rut $usuarios->rut, forma parte de la PlataformaUAAEP.";
            
            
          $data = array(
            'email' => 'plataformaUAAEP@gmail.com',
            'to'    => $director->email,
            'subject' => "Nuevo Alumno en PlataformaUAAEP",
            'bodyMessage' => $mensaje 
            );

        Mail::send('administracion.emailC', $data, function($message) use ($data){
            $message->from($data['email']);
            $message->to($data['to']);
            $message->subject($data['subject']);
        });
      
        return Redirect::to('administracion/nuevo');
    }
}
