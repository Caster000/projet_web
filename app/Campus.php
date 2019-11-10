<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * @property int $id_campus
 * @property string $campus
 * @property Personne[] $personnes
 */
class Campus extends Model
{
    public $timestamps = false;

    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'campus';

    /**
     * The primary key for the model.
     *
     * @var string
     */
    protected $primaryKey = 'id_campus';

    /**
     * @var array
     */
    protected $fillable = ['campus'];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function personnes()
    {
        return $this->hasMany('App\Personne', 'id_campus', 'id_campus');
    }
}
