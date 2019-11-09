<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * @property int $id_activite
 * @property int $id_personne
 * @property string $activite
 * @property string $description
 * @property boolean $visible
 * @property string $recurrence
 * @property string $urlImage
 * @property string $date
 * @property int $prix
 * @property Personne $personne
 * @property Personne[] $personnes_inscrire
 * @property Photo[] $photos
 * @property Personne[] $personnes_voter
 */
class Activite extends Model
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'activite';

    /**
     * The primary key for the model.
     *
     * @var string
     */
    protected $primaryKey = 'id_activite';

    /**
     * @var array
     */
    protected $fillable = ['activite', 'description', 'visible', 'recurrence', 'urlImage', 'date', 'prix', 'id_personne'];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function personne()
    {
        return $this->belongsTo('App\Personne', 'id_personne', 'id_personne');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function personnes_inscrire()
    {
        return $this->belongsToMany('App\Personne', 'inscrire', 'id_activite', 'id_personne');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function photos()
    {
        return $this->hasMany('App\Photo', 'id_activite', 'id_activite');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function personnes_voter()
    {
        return $this->belongsToMany('App\Personne', 'voter', 'id_activite', 'id_personne');
    }
}
