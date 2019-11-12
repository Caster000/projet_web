<?php

namespace App\Exports;

use App\Inscrire;
use http\Env\Request;
use Maatwebsite\Excel\Concerns\FromCollection;

class InscritExport implements FromCollection
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return Inscrire::select('nom','prenom','email')
            ->join('personne','personne.id_personne','=','inscrire.id_personne')
            ->where('id_activite',request('id_activite'))
            ->get();
    }
}
