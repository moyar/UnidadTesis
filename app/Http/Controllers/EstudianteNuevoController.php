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

      
        if((($usuarios->motivo==1  )||( $usuarios->aceptaTutoria !=0 ) )){

        
                $usuarios->activo = 1;
             


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

                $usuarios->save();
                return Redirect::to('administracion/nuevo');
        }
        else{
             return Redirect::to('administracion/nuevo')->with('status', 'El Director de escuela aun no acepta o rechaza la solicitud de Tutoría!');
        }
    }

    public function edit($id)
    {
        $usuarios = Estudiante::find($id);
        
        
        return view('administracion.nuevo.edit')->withUsuarios($usuarios);
    }

    public function update(Request $request, $id)
    {
        
        $usuarios=Estudiante::findOrFail($id);
        
        $usuarios->motivo=$request->get('motivo');
        $usuarios->update();
        return Redirect::to('administracion/nuevo');
    }
    public function destroy($id)
    {
        $usuarios=Estudiante::findOrFail($id);
        $usuarios->delete();
        return Redirect::to('administracion/nuevo');
    }

    public function correo($id){
      $usuarios= Estudiante::find($id);

      $director = User::where('carrera_id','=',$usuarios->carrera_id)->first();
          
      //dd($director);
      if($usuarios->motivo == 1 ){
        $mensaje = "Estimado Director(a) $director->name $director->apellidos se comunica a ud,   que     el Alumno $usuarios->nombre 
                        $usuarios->apellidos, Rut $usuarios->rut,  solicíto Atención Psicopedagógica a la UAAEP.";
            
        } 
        else{
          if($usuarios->motivo == 2 ){
              $mensaje = "Estimado Director(a) $director->name $director->apellidos se comunica a ud,   que     el Alumno $usuarios->nombre 
                        $usuarios->apellidos, Rut $usuarios->rut,  solicíto Tutorías a la UAAEP.";
            
            } 
            else{
              $mensaje = "Estimado Director(a) $director->name $director->apellidos se comunica a ud,   que     el Alumno $usuarios->nombre 
                        $usuarios->apellidos, Rut $usuarios->rut,  solicíto Tutorías y Atención Psicopedagógica a la UAAEP.";
            }
            
        }   
          $data = array(
            'email' => 'plataformaUAAEP@gmail.com',
            'to'    => $director->email,
            'subject' => "Solicitudes a PlataformaUAAEP",
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
