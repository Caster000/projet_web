<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class GeneralController extends Controller
{
    public function accueil(){                //retourne l'acceuil
        return view('general/accueil');
    }

    public function mentions_legales(){                //retourne les ML
        return view('general/mentions_legales');
    }

    public function cgv(){                //retourne les cgv
        return view('general/cgv');
    }
    public function cookieConsent(){                //affiche le cookie consent
        Session::put('cookieConsent',1);
        return redirect('/');
    }
}
