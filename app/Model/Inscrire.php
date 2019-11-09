<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * @property int $id_personne
 * @property int $id_activite
 * @property Activite $activite
 * @property Personne $personne
 */
class Inscrire extends Model
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'inscrire';

    /**
     * @var array
     */
    protected $fillable = [];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function activite()
    {
        return $this->belongsTo('App\Activite', 'id_activite', 'id_activite');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function personne()
    {
        return $this->belongsTo('App\Personne', 'id_personne', 'id_personne');
    }
}
