<?php

namespace App\Http\Controllers;

use App\Photo;
use Illuminate\Http\Request;

class PhotoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($id_activite)
    {   $activite=Photo::where('id_activite',$id_activite)->first();
        $gallerie =Photo::select('titre','urlImage','visible','id_activite')->where('id_activite',$id_activite)->get();
        //echo $gallerie;
        return view('activites.gallerie',compact('gallerie','activite'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function addPhoto(Request $request){
        $this->validate($request, ['file'=>'required|mimes:jpg,jpeg,png']);
        $file= $request->file;
        $name = time().$file->getClientOriginalName();
        $destinationPath = '/projet_web/public/images/activite/';
       // $destinationPath = '/projet_web/storage/app/public/images/activite/'; // upload path
       // $request->file('file')->storeAs('/images/activite/', $file);
        $file->move('images/activite/'.$request->id_activite."/",$name);
        $photo = new Photo;
        $photo->titre=$name;
        $photo->urlImage = 'images/activite/'.$request->id_activite."/".$name;
        $photo->visible= 1;
        $photo->id_personne= auth()->user()->id_personne;
        $photo->id_activite=$request->id_activite;
        $photo->save();
        return redirect('/activites/');
    }

    public function image($id_activite, $titre){
        $gallerie =Photo::select('titre','urlImage','visible','id_activite')
            ->where('id_activite',$id_activite)
             ->where('titre',$titre)
            ->first();
        //dd($gallerie);
        return view('activites.image_gallerie',compact('gallerie'));
    }

}
