<?php

namespace App\Http\Controllers;

use App\Activite;
use App\Exports\InscritExport;
use App\Inscrire;
use Illuminate\Http\Request;
use Illuminate\Http\UploadedFile;
use Maatwebsite\Excel\Facades\Excel;
use Illuminate\Support\Facades\DB;

class ActivitesController extends Controller
{
    public function index(){                 //Affichage de base
        $activites=\App\Activite::select('id_activite','activite','description','recurrence','urlImage','date','prix','visible')->get();
        return view('activites.activites', compact('activites'));
    }

    public function activiteNumero($numero){                //affichage d'une activite
    	$activite = Activite::find($numero);
        return view('activites.activite', compact('activite'));
    }

    public function addActivite(Request $request){                //ajout d'une activite depuis infos du POST
        $activite = new Activite();
        $activite->activite= $request->nom;
        $activite->description= $request->description;
        $activite->visible= 1;
        $activite->recurrence= $request->recurrence;
        $destinationPath = '../storage/app/public/images/activite'; // upload path
        $file = $request->image->getClientOriginalName();
        $request->file('image')->storeAs('/images/activite', $file);
        $activite->urlImage = $destinationPath."/".$file;
        $activite->date= $request->date;
        $activite->prix= $request->prix;
        $activite->id_personne=auth()->user()->id_personne;
        $activite->save();
        return redirect('/activites');
    }
    public function delete($id_activite){                //Supression activite
        $activite = \App\Activite::find($id_activite);
        if($activite!=null){
            $activite->effacerActivite();
        };
        return back();
    }
    public function inscription($id_activite)                //inscription à un activite
    {
        if (!(\App\Inscrire::where('id_activite', $id_activite)->where('id_personne', auth()->user()->id_personne)->first())) {
            \App\Inscrire::create([
                'id_personne' => auth()->user()->id_personne,
                'id_activite' => $id_activite,
            ]);
        }
        return back();
    }
    public function desinscription($id_activite){                //desincription a une activite
        $activite = \App\Inscrire::where('id_activite', $id_activite)->where('id_personne', auth()->user()->id_personne)->first();
        if($activite!=null){
            $activite->delete();
        }
        return back();
    }

    public function rendreVisible($id_activite){                //rendre visible une activite
        \App\Activite::where('id_activite', $id_activite)->first()->update(['visible'=>1]);
        return back();
    }

    public function rendreInvisible($id_activite){                //rendre invisible une activite
        \App\Activite::where('id_activite', $id_activite)->first()->update(['visible'=>0]);
        return back();
    }

    public  function updateActivites()                //modification activite
    {
        return view('activites.updateActivites');
    }

    public function export($id_activite)                //telechargement de la liste des inscrits
    {
        return Excel::download(new InscritExport, 'liste_inscrit.csv');
    }

    public function evenementsPasses(){                //affichages des activite passé
        $activites=\App\Activite::where('date','<', DB::raw('NOW()'))->select('id_activite','activite','description','recurrence','urlImage','date','prix','visible')->get();
        return view('activites.activites', compact('activites'));
    }

    public function evenementsDuMois(){                //affichages des activite du mois
        $activites=\App\Activite::where(DB::raw('MONTH(date)'),'=', DB::raw('MONTH(NOW())'))->select('id_activite','activite','description','recurrence','urlImage','date','prix','visible')->get();
        return view('activites.activites', compact('activites'));

    }

    public function update( Request $request){

        $activite =Activite::where('id_activite',$request->id_activite)->first();
        //dd( json_encode($activite));
        echo json_encode($activite);
    }

}
