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
        echo $file;
        $request->file('image')->storeAs('/images/activite', $file);
        $activite->urlImage = $destinationPath."/".$file;
        //$file->move($destinationPath, $path); // uploading file to given path
        $activite->date= $request->date;
        echo $activite;
        $activite->save();
        return redirect('/activites');
    }
    public function delete($id_activite){
        $activite = Activite::find($id_activite);
        $activite->delete();
        return redirect('/activites');
    }
    public function inscrire($id_activite){
//        $activite = Activite::find($id_activite);
//        $activite->delete();
        return redirect('/activites');
    }
}
