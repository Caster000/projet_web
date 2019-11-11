<?php

namespace App\Http\Controllers;

use App\Commande;
use App\Produit;
use Illuminate\Http\Request;

class PanierController extends Controller
{
    public function index(){
        $articles = Commande::where('id_personne',auth()->user()->id_personne )->get();
//            ->where('valider',0)
//            ->join('contenir','contenir.id_commande','=','commande.id_commande')
//            ->join('produit','produit.id_produit','=','contenir.id_produit') ->get();
        echo $articles;
        return view('boutique.panier', compact('articles'));
    }
}
