<?php

namespace App;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;

/**
 * @property int $id_photo
 * @property int $id_personne
 * @property Personne $personne
 * @property Photo $photo
 */
class Liker extends Model
{
    public $timestamps = false;
    public $incrementing = false;
    protected $primaryKey = array('id_photo', 'id_personne');
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'liker';

    /**
     * @var array
     */
    protected $fillable = ['id_photo','id_personne'];

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

    protected function setKeysForSaveQuery(Builder $query)
    {
        return $query->where('id_photo', $this->getAttribute('id_photo'))
            ->where('id_personne', $this->getAttribute('id_personne'));
    }
}
