<?php

namespace App\Http\Controllers;

use App\Produit;
use Illuminate\Http\Request;

class BoutiqueController extends Controller
{
    public function index(){                //retourne la vue de base de la boutique
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

    public function panier(){                //retourne le panier
        return view('boutique.panier');
    }

    public function article($numero){                //retourne sur la page de l'article
        $produit = Produit::find($numero);
        return view('boutique.article', compact('produit'));
    }

    public function addArticle(Request $request){                //ajout d'un nouvel article a la boutique
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
    public function delete($id_article){                //suppression d'un article de la boutique
        $article = Produit::find($id_article);
        $article->contenirs()->delete();
        $article->delete();
        return redirect('/boutique');
    }
    public function updateArticles(){                //upadtae d'un article
        return view('boutique.updateArticles');
    }

    public function trierParCriteres(Request $request){                //affiche par critère
        $categorie = $request->categorie;
        $prix = $request->prix;
        $categorieData['data'] = \App\Produit::parCriteres($prix, $categorie);
        echo json_encode($categorieData);
        exit;
    }

    public function rechercher(Request $request){                //recherche
        $recherche = $request->recherche;
        $rechercheData['data'] = \App\Produit::rechercher($recherche);
        //dd($rechercheData);
        echo json_encode($rechercheData);
        exit;
    }

    public function fetch(Request $request){                //autocompletion
        //dd($request->get('query'));
        if($request->get('query')){
            $query = $request->get('query');
            $data = \App\Produit::rechercher($query);
            $output = '<ul class="dropdown-menu p-0" style="display:block; position:relative">';
            foreach ($data as $row){
                $output .= '<li class="bg-white text-dark"><a href"#">'.$row->nom.'</a></li>';
            }
            $output .= '</ul>';
            //dd($output);
            echo $output;
           // echo json_encode($data);
           // exit;

        }
    }

}
