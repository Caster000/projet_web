<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * @property int $id_role
 * @property string $role
 * @property Personne[] $personnes
 */
class Role extends Model
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'role';

    /**
     * The primary key for the model.
     *
     * @var string
     */
    protected $primaryKey = 'id_role';

    /**
     * @var array
     */
    protected $fillable = ['role'];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function personnes()
    {
        return $this->hasMany('App\Personne', 'id_role', 'id_role');
    }
}
