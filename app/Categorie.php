<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * @property int $id_categorie
 * @property string $categorie
 * @property Produit[] $produits
 */
class Categorie extends Model
{
    public $timestamps = false;

    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'categorie';

    /**
     * The primary key for the model.
     *
     * @var string
     */
    protected $primaryKey = 'id_categorie';

    /**
     * @var array
     */
    protected $fillable = ['categorie'];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function produits()
    {
        return $this->hasMany('App\Produit', 'id_categorie', 'id_categorie');
    }
}
