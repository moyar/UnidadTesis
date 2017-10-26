<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Taller;
use App\Estudiante;
use App\Categoria;
use App\Asistencia;
use App\Fecha_taller;
use App\Estudiante_fechat;
use Illuminate\Support\Facades\Redirect;

use Session;
use DB;
use Illuminate\Support\Collection;
use Response;



class TallerController extends Controller
{
     public function __construct()
    {
        $this->middleware('auth');
        
    }

    public function index(Request $request)
    {
     
        if ($request)
        {
            $query=trim($request->get('searchText'));
           
            $talleres = Taller::orderBy('id', 'desc')
            ->where('nombre_grupo','LIKE','%'.$query.'%')
            ->orwhere('semestre','LIKE','%'.$query.'%')
            ->orwhere('año','LIKE','%'.$query.'%')
            ->paginate(10);
            return view('administracion.taller.index',["talleres"=>$talleres,"searchText"=>$query]);
        }
    }
     public function create()
    {
        $categorias = Categoria::all();
        $estudiantes = Estudiante::all();
        return view('administracion.taller.create')->with('categorias',$categorias)->with('estudiantes',$estudiantes);

    }

     public function store(Request $request)
    {
      
        $talleres = new Taller;
        $talleres->nombre_grupo = $request->nombre_grupo;
        $talleres->categorias()->associate( $request->categoria_id);
        $talleres->semestre = $request->semestre;
        $talleres->año = $request->año;
        $talleres->save();
        $talleres->estudiantes()->sync($request->tags);
        return Redirect::to('administracion/taller');
    }



    public function show($id)
    {
        $talleres = Taller::find($id);
        
        return view('administracion.taller.show')->withTalleres($talleres);
    }

    public function mostrarGestionar($id){

         $talleres = Taller::find($id);
         $estudiantes =Taller::find($id)->estudiantes()->orderBy('id_user')->get();
         return view('administracion.taller.gestionar', compact('talleres', 'estudiantes','id'));

    }

       public function crear($id)
    {
   
         $talleres = Taller::find($id);
         $estudiantes =Taller::find($id)->estudiantes()->orderBy('id_user')->get();
        
         $fecha_taller=Fecha_taller::with('talleres')->where('taller_id','=',$id)->orderBy('fecha','desc')->get();

         return view('administracion.taller.asistencia.crear', compact('talleres', 'estudiantes','id','fecha_taller'));

    }



    public function edit($id)
    {
       
        $talleres = Taller::find($id);
        $categorias = Categoria::all();
        
        $cate = array();
        foreach ($categorias as $categoria) {
            $cate[$categoria->id_categoria] = $categoria->nombre;
        }
         //dd($cate);
        $estudiantes = Estudiante::all();
        $estu = array();
        foreach ($estudiantes as $estudiante) {
            $estu[$estudiante->id_user] = $estudiante->nombre;
        }


        return view('administracion.taller.edit')->withTalleres($talleres)->withCategorias($cate)->withEstudiantes($estu);
    }

    public function update(Request $request, $id)
    {
        // store in the database
        $talleres = Taller::find($id);

        $talleres->nombre_grupo = $request->nombre_grupo;
        $talleres->categoria_id = $request->categoria_id;
        $talleres->semestre = $request->semestre;
        $talleres->año = $request->año;
        $talleres->save();


        if (isset($request->tags)) {
            $talleres->estudiantes()->sync($request->tags);
        } else {
            $talleres->estudiantes()->sync(array());
        }
        
       // // $post = Tutoria::with('estudiantes')->find($id);
       //  $estudiantes = $tutorias->estudiantes->toArray();
         return Redirect::to('administracion/taller');
    }
    
    public function destroy($id)
    {
        $talleres = Taller::find($id);
        $talleres->estudiantes()->detach();

        $talleres->delete();

        
        return Redirect::to('administracion/taller');
    }

     public function nuevaAsistencia(Request $r){

        $talleres = Taller::find($r->tallerId);

        $fecha_taller= new Fecha_Taller;
        $fecha_taller->fecha = $r->get('fecha');
        $fecha_taller->periodo = $r->get('periodo');
        $fecha_taller->estado='No Realizada';
        //$fecha_tutoria->tutoria_id=$r->get('tutoriaId');
        $fecha_taller->talleres()->associate($talleres);
                                               
        $fecha_taller->save();

        return Redirect::to(action('TallerController@crear',$r->tallerId));
        
    }
    public function saveAlumno(Request $r){
        $talleres = Taller::find($r->tallerID);
        $fecha_taller =Fecha_taller::find($r->fechaID);
        $estudiantes =Taller::find($r->tallerID)->estudiantes()->orderBy('id_user')->get();  
        
        $est = Estudiante_fechat::with('fecha_talleres')->where('fecha_id','=',$r->fechaID)->select('fecha_id')->count();
        if($est>0){
            echo("taller realizado");

        }
        else{
            foreach ($estudiantes as $estudiante) {
           
            if($r->estado== null){
                    $fecha_taller->estado='Realizado';
                    $fecha_taller->save();
                    $estudiante_fechat = new Estudiante_fechat;
                    $estudiante_fechat->estado=0;
                    $estudiante_fechat->estudiantes()->associate($estudiante->id_user);
                    $estudiante_fechat->fecha_talleres()->associate($fecha_taller);
                    $estudiante_fechat->save();


            }
            else{
                if (in_array($estudiante->id_user,$r->estado)){
                    
                    $estudiante_fechat = new Estudiante_fechat;
                    $estudiante_fechat->estado=1;
                    $estudiante_fechat->estudiantes()->associate($estudiante->id_user);
                    $estudiante_fechat->fecha_talleres()->associate($fecha_taller);
                    $estudiante_fechat->save();
                    }
                else{
                    $estudiante_fechat = new Estudiante_fechat;
                    $estudiante_fechat->estado=0;
                    $estudiante_fechat->estudiantes()->associate($estudiante->id_user);
                    $estudiante_fechat->fecha_talleres()->associate($fecha_taller);
                    $estudiante_fechat->save();
                }
                $fecha_taller->estado='Realizado';
                $fecha_taller->save();
            }

            }

        }

       return Redirect::to(action('TallerController@crear',$r->tallerID));
    }

    public function asisAlumno(Request $r, $id_t)
    {
        $fecha_taller=Fecha_taller::find($id_t);
        $talleres=Taller::find($fecha_taller->taller_id);
        $estudiantes =Taller::find($fecha_taller->taller_id)->estudiantes()->orderBy('id_user')->get();      
       return view('administracion.taller.asistencia.asi', compact('talleres', 'estudiantes','id_t','fecha_taller'));
    }


    public function eliminar(Request $r, $id_t)
    {
        
        $fecha_taller = Fecha_taller::find($id_t);
        $fecha_taller->delete();
        
    
        return Redirect::to(action('TallerController@crear',$r->tallerId));
  
        
    }

    public function editL($id_t){

        $fecha_taller = Fecha_taller::find($id_t);
        $talleres= Taller::find($fecha_taller->taller_id);
        $estudiante_fechat = Estudiante_fechat::with('fecha_talleres')->where('fecha_id','=',$id_t)->get();
        $estudiantes= Estudiante_fechat::with('estudiantes')->where('fecha_id','=',$id_t)->get();

        //dd($estudiantes);
         return view('administracion.taller.asistencia.edit', compact('talleres', 'tem','estudiantes','id_t','fecha_taller'));
        
    }


    public function updateL(Request $r, $id_t){
        $estudiantes= Estudiante_fechat::with('estudiantes')->where('fecha_id','=',$id_t)->get();
      
           foreach ($estudiantes as $estudiante) {
           
            if($r->estado== null){
                    $estudiante->estado=0;
                    $estudiante->save();

            }
            else{
                if (in_array($estudiante->estudiante_id, $r->estado)){
                    $estudiante->estado=1;
                    $estudiante->save();
                    }
                else{
                    
                    $estudiante->estado=0;
                    $estudiante->save();
                }
                
            }

         }
        
            return Redirect::to(action('TallerController@crear',$r->tutoriaID));

    }
    public function ver($id){

         $talleres = Taller::find($id);
         $estu =Taller::find($id)->estudiantes()->get();
         $fecha_taller =Fecha_taller::where('taller_id','=',$id)->get();
         $estFinal = array();
         $indice = 0;
         foreach ($fecha_taller as $a) {
                  $estudiantes= Estudiante_fechat::where('fecha_id','=',$a->id_t)->get();
                  $estFinal[$indice] = $estudiantes;
                  $indice+=1;
                  $estudi= Estudiante_fechat::where('fecha_id','=',$a->id_t)->select('estado')->get();
      
               
        }
       // dd($estFinal);
      
        return view('administracion.taller.ver',compact('talleres','estFinal','fecha_taller','estu'));
       
    }

}
