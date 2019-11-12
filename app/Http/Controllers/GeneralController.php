<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

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
    public function cookieConsent(){
        Session::put('cookieConsent',1);
        return redirect('/');
    }
}
