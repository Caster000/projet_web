<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * @property int $id_commande
 * @property int $id_personne
 * @property boolean $valider
 * @property Personne $personne
 * @property Contenir[] $contenirs
 */
class Commande extends Model
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'commande';

    /**
     * The primary key for the model.
     *
     * @var string
     */
    protected $primaryKey = 'id_commande';

    /**
     * @var array
     */
    protected $fillable = ['id_personne', 'valider'];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function personne()
    {
        return $this->belongsTo('App\Personne', 'id_personne', 'id_personne');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function contenirs()
    {
        return $this->hasMany('App\Contenir', 'id_commande', 'id_commande');
    }
}
