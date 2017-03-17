<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Http\Requests;
use App\Categoria;
use Session;
use Illuminate\Support\Facades\Redirect;
use DB;



class dtallerController extends Controller
{
    public function __construct()
    {

    }
    public function index(Request $request)
    {
        if ($request)
        {
            $query=trim($request->get('searchText'));
            $dtaller=DB::table('categoria')->where('nombre','LIKE','%'.$query.'%')
            ->where ('estado','=','activo')
            ->orderBy('id_categoria','desc')
            ->paginate(10);
            return view('administracion.dtaller.index',["dtaller"=>$dtaller,"searchText"=>$query]);
        }
    }
    public function create()
    {
        return view("administracion.dtaller.create");
    }
    public function store (Request $request)
    {
        $dtaller=new Categoria;
        $dtaller->nombre=$request->get('nombre');
        $dtaller->estado='activo';
        $dtaller->save();
        return Redirect::to('administracion/dtaller');

    }
    public function show($id)
    {
        return view("administracion.dtaller.show",["dtaller"=>Categoria::findOrFail($id)]);
    }
    public function edit($id)
    {
        return view("administracion.dtaller.edit",["dtaller"=>Categoria::findOrFail($id)]);
    }
    public function update(Request $request,$id)
    {
        $dtaller=Categoria::findOrFail($id);
        $dtaller->nombre=$request->get('nombre');
        $dtaller->update();
        return Redirect::to('administracion/dtaller');
    }
    public function destroy($id)
    {
        $dtaller=Categoria::findOrFail($id);
        $dtaller->estado='inactivo';
        $dtaller->update();
        return Redirect::to('administracion/dtaller');
    }}
