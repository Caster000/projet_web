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
    public function index(){
        $activites=\App\Activite::select('id_activite','activite','description','recurrence','urlImage','date','prix','visible')->get();
        return view('activites.activites', compact('activites'));
    }

    public function activiteNumero($numero){
    	$activite = Activite::find($numero);
        return view('activites.activite', compact('activite'));
    }

    public function addActivite(Request $request){
        $activite = new Activite();
        $activite->activite= $request->nom;
        $activite->description= $request->description;
        $activite->visible= 1;
        $activite->recurrence= $request->recurrence;
        $destinationPath = '/projet_web/storage/app/public/images/activite'; // upload path
        $file = $request->image->getClientOriginalName();
        $request->file('image')->storeAs('/images/activite', $file);
        $activite->urlImage = $destinationPath."/".$file;
        $activite->date= $request->date;
        $activite->prix= $request->prix;
        $activite->id_personne=auth()->user()->id_personne;
        $activite->save();
        return redirect('/activites');
    }
    public function delete($id_activite){
        $activite = \App\Activite::find($id_activite);
        if($activite!=null){
            $activite->effacerActivite();
        };
        return back();
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
        $activite = \App\Inscrire::where('id_activite', $id_activite)->where('id_personne', auth()->user()->id_personne)->first();
        if($activite!=null){
            $activite->delete();
        }
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

    public  function updateActivites()
    {
        return view('activites.updateActivites');
    }

    public function export($id_activite)
    {
        return Excel::download(new InscritExport, 'liste_inscrit.csv');
    }

    public function evenementsPasses(){
        $activites=\App\Activite::where('date','<', DB::raw('NOW()'))->select('id_activite','activite','description','recurrence','urlImage','date','prix','visible')->get();
        return view('activites.activites', compact('activites'));
    }

    public function evenementsDuMois(){
        $activites=\App\Activite::where(DB::raw('MONTH(date)'),'=', DB::raw('MONTH(NOW())'))->select('id_activite','activite','description','recurrence','urlImage','date','prix','visible')->get();
        return view('activites.activites', compact('activites'));

    }

}
