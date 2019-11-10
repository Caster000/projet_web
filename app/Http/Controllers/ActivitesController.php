<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ActivitesController extends Controller
{
    public function index(){
        $activites=\App\Activite::where('visible','=','1')->select('activite','description','recurrence','urlImage','date','prix')->get();
        return view('activites.activites', compact('activites'));
    }

    public function activiteNumero($numero){
        return view('activites.activites', compact('numero'));
    }
}
