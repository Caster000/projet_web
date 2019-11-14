<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * @property int $id_commentaire
 * @property int $id_personne
 * @property int $id_photo
 * @property string $commentaire
 * @property boolean $visible
 * @property Personne $personne
 * @property Photo $photo
 */
class Commentaire extends Model
{
    public $timestamps = false;

    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'commentaire';

    /**
     * The primary key for the model.
     *
     * @var string
     */
    protected $primaryKey = 'id_commentaire';

    /**
     * @var array
     */
    protected $fillable = ['id_personne', 'id_photo', 'commentaire', 'visible'];

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
