<?php

namespace App\Http\Controllers;

use App\Commande;
use App\Produit;
use Illuminate\Http\Request;

class PanierController extends Controller
{
    public function index(){
        $article = Commande::where('id_personne', )
        return view('activites.activites', compact('activites'));
    }
}
