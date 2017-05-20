<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Http\Requests;
use App\Carrera;
use App\Estudiante;
use App\Tutor;
use Session;
use Illuminate\Support\Facades\Redirect;
use DB;

class CarreraController extends Controller
{
     public function __construct()
    {

    }
    public function index(Request $request)
    {
        if ($request)
        {
            $query=trim($request->get('searchText'));
            $carrera=DB::table('carrera')->where('nombre','LIKE','%'.$query.'%')
            ->orwhere ('telefono','LIKE','%'.$query.'%')
            ->orwhere ('facultad','LIKE','%'.$query.'%')
            ->orwhere ('campus','LIKE','%'.$query.'%')
            ->orderBy('id','desc')
            ->paginate(10);
            return view('administracion.carrera.index',["carrera"=>$carrera,"searchText"=>$query]);
        }
    }
    public function create(){

        return view("administracion.carrera.create");
    }
    public function store (Request $request)
    {
        $carrera=new Carrera;
        $carrera->nombre=$request->get('nombre');
        $carrera->telefono=$request->get('telefono');
        $carrera->facultad=$request->get('facultad');
        $carrera->campus=$request->get('campus');
        $carrera->save();
        return Redirect::to('administracion/carrera');

    }
    public function show($id)
    {
        return view("administracion.carrera.show",["carrera"=>Carrera::findOrFail($id)]);
    }
    public function edit($id)
    {
        return view("administracion.carrera.edit",["carrera"=>Carrera::findOrFail($id)]);
    }
    public function update(Request $request,$id)
    {
        $carrera= Carrera::findOrFail($id);
        $carrera->nombre=$request->get('nombre');
        $carrera->telefono=$request->get('telefono');
        $carrera->facultad=$request->get('facultad');
        $carrera->campus=$request->get('campus');
        $carrera->update();
        return Redirect::to('administracion/carrera');
    }
    public function destroy($id)
    {
        $carrera=Carrera::findOrFail($id);

        $carrera->delete();
        return Redirect::to('administracion/carrera');
    }
}
