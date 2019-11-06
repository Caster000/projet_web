<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AdministrationController extends Controller
{
    public function controlIdentity($identity){
        //Si la session correspond à une session admin, renvoyer true ou admin
        //return true;
        //Si la session n'est pas une session admin, renvoyer false ou no_admin
        //return false;
    }

    public function boutique(){
        //$identity=$this->controlIdentity();
        return view('boutique');//, compact('identity'));
    }

    public function article($numero){
        //$identity=$this->controlIdentity();
        return view('article', compact('numero'));//, 'identity'));
    }

    public function activites(){
        //Contrôler que l'utilisateur soit administrateur
        //Si c'est vrai, passer un paramètre true ou admin pour indiquer qu'on se connecte en admin
        //Sinon passer un paramètre false ou no_admin pour qu'on se connecte en utilisateur
        //$identity=$this->controlIdentity();
        return view('activites');//, compact('identity'));
    }

    public function activiteNumero($numero){
        //$identity=$this->controlIdentity();
        return view('activites', compact('numero'));//, 'identity'));
    }


}
