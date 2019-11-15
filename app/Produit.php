<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * @property int $id_produit
 * @property int $id_categorie
 * @property string $nom
 * @property string $description
 * @property int $prix
 * @property string $urlImage
 * @property Categorie $categorie
 * @property Contenir[] $contenirs
 */
class Produit extends Model
{
    public $timestamps = false;

    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'produit';

    /**
     * The primary key for the model.
     *
     * @var string
     */
    protected $primaryKey = 'id_produit';

    /**
     * @var array
     */
    protected $fillable = ['id_categorie', 'nom', 'description', 'prix', 'urlImage'];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function categorie()
    {
        return $this->belongsTo('App\Categorie', 'id_categorie', 'id_categorie');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function contenirs()
    {
        return $this->hasMany('App\Contenir', 'id_produit', 'id_produit');
    }

    public static function parCriteres($prix = null, $categorie = null){   // Retourne tous les produits appartenant à une catégorie
        $produitsCategorie = '';
        if($categorie!=null || $prix = null) {
            if ($categorie != "Tous") {
                $id_categorie = \App\Categorie::select('id_categorie')->where('categorie', $categorie)->first()->id_categorie;
                switch ($prix) {
                    case 'Aleatoire':
                        $produitsCategorie = \App\Produit::where('id_categorie', $id_categorie)->get();
                        break;
                    case 'Croissant':
                        $produitsCategorie = \App\Produit::where('id_categorie', $id_categorie)->orderBy('prix', 'asc')->get();
                        break;
                    case 'Decroissant':
                        $produitsCategorie = \App\Produit::where('id_categorie', $id_categorie)->orderBy('prix', 'desc')->get();
                        break;
                    default:
                        break;
                }
            } else {
                switch ($prix) {
                    case 'Aleatoire':
                        $produitsCategorie = \App\Produit::all();
                        break;
                    case 'Croissant':
                        $produitsCategorie = \App\Produit::orderBy('prix', 'asc')->get();
                        break;
                    case 'Decroissant':
                        $produitsCategorie = \App\Produit::orderBy('prix', 'desc')->get();
                        break;
                    default:
                        break;
                }
            }

            return $produitsCategorie;
        } else{
            abort(415);
        }
    }

    public static function rechercher($recherche = ''){
        return \App\Produit::where('nom', 'like', "%$recherche%")->orWhere('description', 'like', "%$recherche%")->get();
    }

}
