<?php

namespace App\Http\Controllers;

use App\Activite;
use Illuminate\Http\Request;

class ActivitesController extends Controller
{
    public function index(){
        $activites=\App\Activite::where('visible','=','1')->select('activite','description','recurrence','urlImage','date','prix')->get();
        return view('activites.activites', compact('activites'));
    }

    public function activiteNumero($numero){
    	$activite = Activite::find($numero);
        return view('activites.activite', compact('activite'));
    }
}
