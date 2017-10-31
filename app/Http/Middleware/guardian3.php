<?php

namespace App\Http\Middleware;

use Closure;

class guardian3
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
        if($usuario_actual->rol_id!=3){
            return redirect('/login');
        }
       
        return $next($request);
    }
}
