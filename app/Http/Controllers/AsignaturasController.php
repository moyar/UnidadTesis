<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Http\Requests;
use App\Asignatura;
use Session;
use Illuminate\Support\Facades\Redirect;
use DB;


class AsignaturasController extends Controller
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
            $asignatura=DB::table('asignaturas')->where('nombre','LIKE','%'.$query.'%')
            ->where ('estado','=','activo')
            ->orderBy('id_asignatura','desc')
            ->paginate(10);
            return view('administracion.asignatura.index',["asignatura"=>$asignatura,"searchText"=>$query]);
        }
    }
    public function create()
    {
        return view("administracion.asignatura.create");
    }
    public function store (Request $request)
    {
        $asignatura=new Asignatura;
        $asignatura->codigo=$request->get('codigo');
        $asignatura->nombre=$request->get('nombre');
        $asignatura->estado='activo';
        $asignatura->save();
        return Redirect::to('administracion/asignatura');

    }
    public function show($id)
    {
        return view("administracion.asignatura.show",["asignatura"=>Asignatura::findOrFail($id)]);
    }
    public function edit($id)
    {
        return view("administracion.asignatura.edit",["asignatura"=>Asignatura::findOrFail($id)]);
    }
    public function update(Request $request,$id)
    {
        $asignatura=Asignatura::findOrFail($id);
        $asignatura->codigo=$request->get('codigo');
        $asignatura->nombre=$request->get('nombre');
        $asignatura->update();
        return Redirect::to('administracion/asignatura');
    }
    public function destroy($id)
    {
        $asignatura=Asignatura::findOrFail($id);
        $asignatura->estado='inactivo';
        $asignatura->update();
        return Redirect::to('administracion/asignatura');
    }
}
