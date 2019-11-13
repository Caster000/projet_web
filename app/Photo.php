<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * @property int $id_photo
 * @property int $id_personne
 * @property int $id_activite
 * @property string $titre
 * @property string $urlImage
 * @property boolean $visible
 * @property Activite $activite
 * @property Personne $personne
 * @property Commenter[] $commenters
 * @property Personne[] $personnes
 */
class Photo extends Model
{
    public $timestamps = false;

    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'photo';

    /**
     * The primary key for the model.
     *
     * @var string
     */
    protected $primaryKey = 'id_photo';

    /**
     * @var array
     */
    protected $fillable = ['id_personne', 'id_activite', 'titre', 'urlImage', 'visible'];

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

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function commenters()
    {
        return $this->hasMany('App\Commenter', 'id_photo', 'id_photo');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function personnes()
    {
        return $this->belongsToMany('App\Personne', 'liker', 'id_photo', 'id_personne');
    }

    public function effacerPhoto(){
        $this->commenters()->delete(); //Supprimer tous les commentaires liés à la photo
        $likes = \App\Liker::where('id_photo', $this->id_photo)->get();
        foreach($likes as $like){
            $like->delete();   //Supprimer tous les likes liés à la photo
        }
        $this->delete(); //Supprimer la photo
    }
}
