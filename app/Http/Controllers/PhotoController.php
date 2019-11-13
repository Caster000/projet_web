<?php

namespace App\Http\Controllers;

use App\Commenter;
use App\Liker;
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
        return view('activites.galerie',compact('galerie','activite'));
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
        $like = Liker::select('liker.id_personne','liker.id_photo')
            ->where('photo.titre',$titre)
            ->join('photo','photo.id_photo','=','liker.id_photo')->get();
        //echo $like;
        $countLike =Liker::where('photo.titre',$titre)
            ->join('photo','photo.id_photo','=','liker.id_photo')
            ->count();
        $comment= Commenter::select('nom',"prenom","commentaire","commenter.visible")
            ->where('photo.titre',$titre)
            ->Join('personne','personne.id_personne','=','commenter.id_personne')
            ->join('photo','photo.id_photo','=','commenter.id_photo')->get();
        //echo $comment;
        return view('activites.image_galerie',compact('galerie','like','countLike','comment'));
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

    public function indexLike(){
       // $like = Liker::where($)
    }
}
