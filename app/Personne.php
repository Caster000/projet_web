<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Personne extends Model
{
    public function commandes(){
        return $this->hasMany(Commande::class);
    }
}
