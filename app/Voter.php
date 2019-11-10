<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * @property int $id_activite
 * @property int $id_personne
 * @property Activite $activite
 * @property Personne $personne
 */
class Voter extends Model
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'voter';

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
