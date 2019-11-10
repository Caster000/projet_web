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
}
