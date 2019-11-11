<?php

namespace App\Http\Controllers;

use App\Activite;
use Illuminate\Http\Request;
use Illuminate\Http\UploadedFile;

class ActivitesController extends Controller
{
    public function index(){
        $activites=\App\Activite::where('visible','=','1')->select('id_activite','activite','description','recurrence','urlImage','date','prix')->get();
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
       /* $pdo = new \PDO();
        $requete = $pdo->prepare("DELETE FROM `inscrire` WHERE `id_personne`=:id_personne AND `id_activite`=:id_activite;");
        $requete->bindValue(':id_personne', auth()->user()->id_personne);
        $requete->bindValue(':id_activite', $id_activite);
        $requete->execute();*/
        $inscription = \App\Inscrire::where('id_activite', $id_activite)->where('id_personne', auth()->user()->id_personne)->first();
        $inscription->delete();
        //dd($inscription);
        return back();
    }

}
