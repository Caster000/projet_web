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
        $allArticles=Produit::get();
        $allCategories = \App\Categorie::get();
        return view('boutique.boutique', compact('topArticles', 'allArticles', 'allCategories'));
    }

    public function panier(){
        return view('boutique.panier');
    }

    public function article($numero){
        $produit = Produit::find($numero);
        return view('boutique.article', compact('produit'));
    }

    public function addArticle(Request $request){
        $produit = new Produit;
        $produit->nom =$request->nom;
        $produit->description= $request->description;
        $produit->prix =$request->prix;
        $produit->nom =$request->nom;
        $produit->id_categorie =$request->categorie;
        $destinationPath = '/projet_web/storage/app/public/images/articles'; // upload path
        $file = $request->image->getClientOriginalName();
        $request->file('image')->storeAs('/images/articles', $file);
        $produit->urlImage = $destinationPath."/".$file;
        $produit->save();
        return redirect('/boutique');
    }
    public function delete($id_article){
        $article = Produit::find($id_article);
        $article->contenirs()->delete();
        $article->delete();
        return redirect('/boutique');
    }
    public function updateArticles(){
        return view('boutique.updateArticles');
    }

    public function trierParCriteres(Request $request){
        $categorie = \request()->categorie;
        $prix = \request()->prix;
        $categorieData['data'] = \App\Produit::parCriteres($prix, $categorie);
        echo json_encode($categorieData);
        exit;
    }

}
