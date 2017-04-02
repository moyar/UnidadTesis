<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Http\Requests;
use App\Categoria;
use Session;
use Illuminate\Support\Facades\Redirect;
use DB;


class CategoriaController extends Controller
{
    public function __construct()
    {

    }
    public function index(Request $request)
    {
        if ($request)
        {
            $query=trim($request->get('searchText'));
            $categoria=DB::table('categoria')->where('nombre','LIKE','%'.$query.'%')
            ->where ('estado','=','activo')
            ->orderBy('id_categoria','desc')
            ->paginate(10);
            return view('administracion.categoria.index',["categoria"=>$categoria,"searchText"=>$query]);
        }
    }
    public function create()
    {
        return view("administracion.categoria.create");
    }
    public function store (Request $request)
    {
        $categoria=new Categoria;
        $categoria->nombre=$request->get('nombre');
        $categoria->estado='activo';
        $categoria->save();
        return Redirect::to('administracion/categoria');

    }
    public function show($id)
    {
        return view("administracion.categoria.show",["categoria"=>Categoria::findOrFail($id)]);
    }
    public function edit($id)
    {
        return view("administracion.categoria.edit",["categoria"=>Categoria::findOrFail($id)]);
    }
    public function update(Request $request,$id)
    {
        $categoria=Categoria::findOrFail($id);
        $categoria->nombre=$request->get('nombre');
        $categoria->update();
        return Redirect::to('administracion/categoria');
    }
    public function destroy($id)
    {
        $categoria=Categoria::findOrFail($id);
        $categoria->estado='inactivo';
        $categoria->update();
        return Redirect::to('administracion/categoria');
    }
}
