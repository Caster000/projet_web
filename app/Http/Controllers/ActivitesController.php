<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ActivitesController extends Controller
{
    public function index(){
        return view('activites.activites');
    }

    public function activiteNumero($numero){
        return view('activites.activites', compact('numero'));
    }
}
