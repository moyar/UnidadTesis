<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Taller;
use App\Categoria;
use Illuminate\Support\Facades\Redirect;
use App\Estudiante;
use Session;
use DB;
use Illuminate\Support\Collection;
use Response;

class TallerController extends Controller
{
    public function __construct(Request $request) {
      
    }
    public function index(Request $request)
    {
        if($request){
            $query = trim($request->get('searchText'));
            $talleres= DB::table('talleres as t')
            ->join('Categoria as c','t.categoria_id','=','c.id_categoria')
            ->select('t.id','t.nombre_grupo','c.nombre as categoria')
           //verificar where video 10
            ->orderBy('t.id','desc')
            ->paginate(10);
            return view('administracion.taller.index',["talleres"=>$talleres,"searchText"=>$query]);

        }
    }
     public function create()
    {
        $categoria = Categoria::all();
        $estudiantes = Estudiante::all();

        return view('administracion.taller.create')->with('categoria',$categoria)->with('estudiantes',$estudiantes);

    }

     public function store(Request $request)
    {
  
        $talleres = new Taller;
        $talleres->nombre_grupo = $request->nombre_grupo;
        $talleres->categoria_id = $request->categoria_id;
        $talleres->save();
        $talleres->estudiantes()->sync($request->tags);


        return Redirect::to('administracion/taller');
    }


}
