<?php

namespace App\Http\Controllers;

use App\Activite;
use App\Exports\InscritExport;
use App\Inscrire;
use Illuminate\Http\Request;
use Illuminate\Http\UploadedFile;
use Maatwebsite\Excel\Facades\Excel;

class ActivitesController extends Controller
{
    public function index(){
        //$activites=\App\Activite::where('visible','=','1')->select('id_activite','activite','description','recurrence','urlImage','date','prix')->get();
        $activites=\App\Activite::select('id_activite','activite','description','recurrence','urlImage','date','prix','visible')->get();
        return view('activites.activites', compact('activites'));
    }

    public function activiteNumero($numero){
    	$activite = Activite::find($numero);
        return view('activites.activite', compact('activite'));
    }

    public function addActivite(Request $request){
        $activite = new Activite;
        $activite->activite= $request->nom;
        $activite->description= $request->description;
        $activite->visible= 1;
        $activite->recurrence= $request->recurrence;
        $destinationPath = '/projet_web/storage/app/public/images/activite'; // upload path
        $file = $request->image->getClientOriginalName();
        $request->file('image')->storeAs('/images/activite', $file);
        $activite->urlImage = $destinationPath."/".$file;
        $activite->date= $request->date;
        $activite->save();
        return redirect('/activites');
    }
    public function delete($id_activite){
        $activite = Activite::find($id_activite);
        $activite->delete();
        return redirect('/activites');
    }
    public function inscription($id_activite)
    {
        if (!(\App\Inscrire::where('id_activite', $id_activite)->where('id_personne', auth()->user()->id_personne)->first())) {
            \App\Inscrire::create([
                'id_personne' => auth()->user()->id_personne,
                'id_activite' => $id_activite,
            ]);
        }
        return back();
    }
    public function desinscription($id_activite){
        \App\Inscrire::where('id_activite', $id_activite)->where('id_personne', auth()->user()->id_personne)->first()->delete();
        return back();
    }

    public function rendreVisible($id_activite){
        \App\Activite::where('id_activite', $id_activite)->first()->update(['visible'=>1]);
        return back();
    }

    public function rendreInvisible($id_activite){
        \App\Activite::where('id_activite', $id_activite)->first()->update(['visible'=>0]);
        return back();
    }

    public function export($id_activite)
    {
        return Excel::download(new InscritExport, 'liste_inscrit.csv');
    }
}
