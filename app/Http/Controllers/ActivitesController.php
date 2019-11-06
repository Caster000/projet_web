<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ActivitesController extends Controller
{
    public function activites(){
        return view('activites');
    }

    public function activiteNumero($numero){
        return view('activites', compact('numero'));
    }
}
