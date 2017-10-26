<?php

namespace App\Http\Middleware;
use Illuminate\Support\Facades\Auth;
use Closure;

class Guardian
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    
    public function handle($request, Closure $next)
    {
        

         $usuario_actual=\Auth::user();
        if($usuario_actual->rol_id!=1){
            return redirect('/login');
        }
        
        return $next($request);
    
    }
}
