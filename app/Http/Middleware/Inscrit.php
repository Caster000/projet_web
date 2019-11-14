<?php

namespace App\Http\Middleware;

use App\Inscrire;
use Closure;

class Inscrit
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
        $activite=$request->id_activite;
        $personne=auth()->user()->id_personne;
        $inscrit=Inscrire::select('id_personne')->where('id_activite',$activite)->where('id_personne',$personne)->get();
        //dd($inscrit);
        //dd(auth()->user()->id_role===\App\Role::where('role', 'BDE')->first()->id_role);
        $a =auth()->user()->id_role===\App\Role::where('role', 'BDE')->first()->id_role;
        $b=auth()->user()->id_role===\App\Role::where('role', 'CESI')->first()->id_role;
        //dd( $inscrit->isEmpty()  );
        if( $a || $b) { //Si la personne n'est pas du BDE ou du CESI
            return $next($request);
        }elseif($inscrit->isEmpty()){
            abort(404);
        }else {
            return $next($request);
            }
    }
}
