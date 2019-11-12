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
        $galerie =Photo::select('id_photo','titre','urlImage','visible','id_activite')->where('id_activite',$id_activite)->get();
        return view('activites.gallerie',compact('galerie','activite'));
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
        $galerie =Photo::select('id_photo','titre','urlImage','visible','id_activite')
            ->where('id_activite',$id_activite)
             ->where('titre',$titre)
            ->first();
        return view('activites.image_gallerie',compact('galerie'));
    }

    public function photoRendreInvisible($id_photo){
        \App\Photo::find($id_photo)->update(['visible'=>0]);
        return back();
    }

    public function photoRendreVisible($id_photo){
        \App\Photo::find($id_photo)->update(['visible'=>1]);
        return back();
    }

    public function deletePhoto($id_photo){
        $activite = \App\Photo::find($id_photo)->delete();
        return back();
    }
}
