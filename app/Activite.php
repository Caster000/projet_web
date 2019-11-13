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
    public $timestamps = false;
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
    public function personne_creatrice()
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

    public function effacerActivite(){
        $inscriptions = \App\Inscrire::where('id_activite', $this->id_activite)->get();
        foreach($inscriptions as $inscription){
            $inscription->delete(); //Supprime toutes les inscriptions à l'activité
        }
        foreach($this->photos as $photo){
            $photo->effacerPhoto(); //Supprime toutes les photos de l'activité
        }
        $this->delete(); //Supprime l'activité
    }
}
