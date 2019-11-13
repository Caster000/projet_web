<?php

namespace App\Http\Middleware;

use Closure;

class BDE
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
        if(!(auth()->user()->id_role===\App\Role::where('role', 'BDE')->first()->id_role)){ //Si la personne est étudiante ou invitée
            abort(404);
        }
        return $next($request);
    }
}
