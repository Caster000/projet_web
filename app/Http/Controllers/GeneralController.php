<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class GeneralController extends Controller
{
    public function accueil(){
        return view('general/accueil');
    }

    public function conditions_generales(){
        return view('general/conditions');
    }

    public function mentions_legales(){
        return view('general/mentions_legales');
    }

    public function cgv(){
        return view('general/cgv');
    }
}
