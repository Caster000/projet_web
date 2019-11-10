<?php

namespace App\Http\Controllers;

use App\Produit;
use Illuminate\Http\Request;

class BoutiqueController extends Controller
{
    public function index(){
        $topArticles=\DB::table('produit') ->join('contenir', 'produit.id_produit','=','contenir.id_produit')
            ->selectRaw('produit.id_produit, nom, description, prix, urlImage, SUM(quantite) quantite')
            ->groupBy('produit.id_produit')
            ->limit(3)
            ->orderBy('quantite', 'DESC')
            ->orderBy('produit.nom', 'ASC')
            ->get();
        return view('boutique.boutique', compact('topArticles'));
        //:/public/images/article/keychain.png
    }

    public function panier(){
        return view('boutique.panier');
    }

    public function article($numero){
        $produit = Produit::find($numero);
        return view('boutique.article', compact('produit'));
    }

}
