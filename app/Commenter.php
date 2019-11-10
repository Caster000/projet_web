<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * @property int $id_photo
 * @property int $id_personne
 * @property string $Commentaire
 * @property boolean $visible
 * @property Personne $personne
 * @property Photo $photo
 */
class Commenter extends Model
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'commenter';

    /**
     * @var array
     */
    protected $fillable = ['Commentaire', 'visible'];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function personne()
    {
        return $this->belongsTo('App\Personne', 'id_personne', 'id_personne');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function photo()
    {
        return $this->belongsTo('App\Photo', 'id_photo', 'id_photo');
    }
}
