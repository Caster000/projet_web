<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Builder;

/**
 * @property int $id_personne
 * @property int $id_activite
 * @property Activite $activite
 * @property Personne $personne
 */
class Inscrire extends Model
{
    public $timestamps = false;

    protected $primaryKey = ['id_personne', 'id_activite'];
    public $incrementing = false;
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'inscrire';

    /**
     * @var array
     */
    protected $fillable = ['id_personne', 'id_activite'];

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
     * Set the keys for a save update query.
     *
     * @param  \Illuminate\Database\Eloquent\Builder  $query
     * @return \Illuminate\Database\Eloquent\Builder
     */
    protected function setKeysForSaveQuery(Builder $query)
    {
        $keys = $this->getKeyName();
        if(!is_array($keys)){
            return parent::setKeysForSaveQuery($query);
        }

        foreach($keys as $keyName){
            $query->where($keyName, '=', $this->getKeyForSaveQuery($keyName));
        }

        return $query;
    }

    /**
     * Get the primary key value for a save query.
     *
     * @param mixed $keyName
     * @return mixed
     */
    protected function getKeyForSaveQuery($keyName = null)
    {
        if(is_null($keyName)){
            $keyName = $this->getKeyName();
        }

        if (isset($this->original[$keyName])) {
            return $this->original[$keyName];
        }

        return $this->getAttribute($keyName);
    }
}
