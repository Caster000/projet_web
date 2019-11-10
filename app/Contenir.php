<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * @property int $id_produit
 * @property int $id_commande
 * @property int $Quantite
 * @property Commande $commande
 * @property Produit $produit
 */
class Contenir extends Model
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'contenir';

    /**
     * @var array
     */
    protected $fillable = ['Quantite'];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function commande()
    {
        return $this->belongsTo('App\Commande', 'id_commande', 'id_commande');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function produit()
    {
        return $this->belongsTo('App\Produit', 'id_produit', 'id_produit');
    }
}
