<?php

namespace App\Http\Middleware;

use Closure;

class Administration
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
        if(!(auth()->user()->id_role===\App\Role::where('role', 'BDE')->first()->id_role)){ //Si la personne ne fait pas partie du BDE
            abort(404);
        }
        return $next($request);
    }
}
