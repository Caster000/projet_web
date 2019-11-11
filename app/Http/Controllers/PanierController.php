<?php

namespace App\Http\Controllers;

use App\Commande;
use App\Contenir;
use App\Produit;
use Illuminate\Http\Request;

class PanierController extends Controller
{
    public function index(){

        $articles = Commande::where('id_personne',auth()->user()->id_personne )
            ->where('valider',0)
            ->leftJoin('contenir','contenir.id_commande','=','commande.id_commande')
            ->join('produit','produit.id_produit','=','contenir.id_produit') ->get();
        //echo $articles;
        $totale=$articles->sum('prix');
        //echo $totale;
        return view('boutique.panier', compact('articles','totale'));
        }

    public function addToPanier(Request $request, $id_produit){
        $article = new Commande;
        $article->valider =0;
        $article->id_personne=auth()->user()->id_personne;
        $article->save();
        $contenir=new Contenir;
        $contenir->id_produit =$id_produit;
        $contenir->id_commande =$article->id_commande;
        $contenir->Quantite =1;
        $contenir->save();
        return redirect('/boutique/panier');
    }

}
