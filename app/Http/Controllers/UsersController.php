<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Rol;
use App\Carrera;
use App\Http\Requests;
use App\Http\Requests\UserEditFormRequest;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Redirect;
use DB;
use Auth;

use Mail;
use Session;

class Userscontroller extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function __construct()
    {
        $this->middleware('auth');
        
    }

    
    public function index(Request $request)
    {
        
        if ($request)
        {
            $query=trim($request->get('searchText'));
            
            $usuarios = User::orderBy('id', 'desc')
            ->where('name','LIKE','%'.$query.'%')                                
            ->orwhere('email','LIKE','%'.$query.'%') 
            ->paginate(7);


        return view('administracion.usuarios.index',["usuarios"=>$usuarios,"searchText"=>$query]);
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $carrera = Carrera::all();
        $roles = Rol::all();
        return view('administracion.usuarios.create', compact('roles','carrera'));
    }
   public function store (Request $request)
    {
        $roles = Rol::find($request->rol_id);
        $carrera = Carrera::find($request->carrera_id);

       
        $usuarios = new User;
        $usuarios->name = $request->get('name'); 
        $usuarios->apellidos = $request->get('apellidos'); 
        $usuarios->rut = $request->get('rut'); 
        $usuarios->telefono = $request->get('telefono');
        $usuarios->carreras()->associate($carrera); 
        $usuarios->email = $request->get('email');
        $usuarios->password = bcrypt($request->get('password'));
        $usuarios->roles()->associate($roles);  
       
        $usuarios->save();
       
        return Redirect::to('administracion/usuarios');

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        

        $user = User::find($id);
        $carreras = Carrera::all();
        
        $roles = Rol::all();

         $carre = array();
        foreach ($carreras as $carrer) {
            $carre[$carrer->id] = $carrer->nombre;


        }



        $carre2 = array();
        foreach ($roles as $rola) {
            $carre2[$rola->id_rol] = $rola->nombre;

        }

        return view('administracion.usuarios.edit', compact('user','carre','carre2'));


    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $user = User::whereId($id)->firstOrFail();
        $user->name = $request->get('name');
        $user->apellidos = $request->get('apellidos');
        $user->rut = $request->get('rut');
        $user->carrera_id = $request->carrera_id;
        $user->email = $request->get('email');
        $password = $request->get('password');

        if ($password != "") {
            $user->password = Hash::make($password);
        }
        $user->rol_id = $request->rol_id;
        $user->telefono = $request->get('telefono');

        $user->save();
       // $user->saveRoles($request->get('role'));

        return redirect(action('UsersController@edit', $user->id))->with('status', 'El Usuario ha sido modificado!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $usuarios =User::findOrFail($id);
        $usuarios->delete();
       
       return Redirect::to('administracion/usuarios');
     }

     public function perfil(){
        $usuario_actual = Auth::user()->id;
        $usu = User::find(Auth::user()->id);
        //dd($usu->roles->nombre);

        return view('administracion.perfil.datos', compact('usu'));
     }

     public function perfilu(Request $request,$id){

        $user = User::whereId($id)->firstOrFail();
        $user->name = $request->get('name');
        $user->apellidos = $request->get('apellidos');
        $user->rut = $request->get('rut');
        $user->email = $request->get('email');
        $password = $request->get('password');

        if ($password != "") {
            $user->password = Hash::make($password);
        }
        $user->telefono = $request->get('telefono');

        $user->save();
       // $user->saveRoles($request->get('role'));

        return redirect(action('UsersController@perfil'))->with('status', 'El Usuario ha sido modificado!');
     }


}
