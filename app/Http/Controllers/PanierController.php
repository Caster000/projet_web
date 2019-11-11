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

    public function addToPanier($id_produit){
        $commande =Commande::select('id_commande')->where('id_personne',auth()->user()->id_personne)->where('valider',0)->first();
        //echo $commande->id_commande;
        if(!is_null($commande)){
            //echo $commande->id_commande;

            $contenir=new Contenir;
            $contenir->id_produit =$id_produit;
            $contenir->id_commande =$commande->id_commande;
            $contenir->Quantite =1;
            $contenir->save();
        }else{
            $article = new Commande;
        $article->valider =0;
        $article->id_personne=auth()->user()->id_personne;
        $article->save();
        $contenir=new Contenir;
        $contenir->id_produit =$id_produit;
        $contenir->id_commande =$article->id_commande;
        $contenir->Quantite =1;
        $contenir->save();
        }
        return redirect('/boutique/panier');
    }

    public function delete($id_commande, $id_produit){
        //echo $id_commande;
        $contenir = Contenir::where('id_produit',$id_produit)
            ->where('id_commande',$id_commande);
        //echo $contenir;
        $contenir->delete();
        return redirect('/boutique/panier');
    }

    public function addQuantite($id_commande,$id_produit,Request $request){
        $produit= Contenir::where('id_produit',$id_produit)
            ->where('id_commande',$id_commande)->first();
        echo $produit;
        $produit->Quantite=$request->quantite;
        echo $produit;
        $produit->save();
        return redirect('/boutique/panier');
    }


}
