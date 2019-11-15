<?php

namespace App\Http\Controllers;

use App\Commentaire;
use App\Commenter;
use App\Liker;
use App\Photo;
use Illuminate\Http\Request;
use ZipArchive;

class PhotoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($id_activite)                 //retourne les photos
    {   $activite=Photo::where('id_activite',$id_activite)->first();
        $galerie =Photo::select('id_photo','titre','urlImage','visible','id_activite')->where('id_activite',$id_activite)->get();
        return view('activites.galerie',compact('galerie','activite'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function addPhoto(Request $request){                 //ajout de photo
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

    public function image($id_activite, $titre){                 //retourne les phot,commentaire,like et compte les like pour la galerie
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
        $comment= Commentaire::select('id_commentaire','commentaire.id_photo','commentaire.id_personne', 'nom',"prenom","commentaire","commentaire.visible")
            ->where('photo.titre',$titre)
            ->Join('personne','personne.id_personne','=','commentaire.id_personne')
            ->join('photo','photo.id_photo','=','commentaire.id_photo')->get();
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

    public function deletePhoto($id_photo){                 //suppression de la photo
        \App\Photo::find($id_photo)->effacerPhoto();
        return back();
    }

    public function addLike($id_activite,$id_photo,$id_personne){                 //ajout d'un like a la photo
        \App\Liker::create(['id_photo'=>$id_photo, 'id_personne'=>$id_personne]);
        return back();
    }
    public function deleteLike($id_activite,$id_photo,$id_personne){                 //suppression d'un like
        $like =  Liker::where('id_photo',$id_photo)
            ->where('id_personne',$id_personne)->first();
        $like->delete();

        return back();
    }
    public function addCommentaire(Request $request,$id_activite,$id_photo,$id_personne){                 //ajout d'un commentaire
        $com = new Commentaire();
        $com->id_photo=$id_photo;
        $com->id_personne=$id_personne;
        $com->commentaire=$request->commentaire;
        $com->visible=1;
        $com->save();
        return back();
    }

    public function deleteCommentaire($id_commentaire){                 //supression d'un commentaire
        \App\Commentaire::where('id_commentaire', $id_commentaire)->first()->delete();
        return back();
    }

    public function commentaireRendreInvisible($id_commentaire){
        \App\Commentaire::where('id_commentaire', $id_commentaire)->first()->update(['visible'=>0]);

        return back();
    }

    public function commentaireRendreVisible($id_commentaire){
        \App\Commentaire::where('id_commentaire', $id_commentaire)->first()->update(['visible'=>1]);
        return back();
    }

    public function export($id_activite){                 //telechargement des phot de la galerie
        $galerie= Photo::select('urlImage')->where('id_activite',$id_activite)->get();
//        return Storage::url($path);
       // $files = Storage::disk('local')->allFiles($path);
       // Zipper::make(public_path('test.zip'))->add($files);
       // return response()->download(public_path('test.zip'));
//        dd($galerie);
        $zip = new \ZipArchive();
        $zipFile =$id_activite.'.zip';
        if ( $zip->open($zipFile, \ZipArchive::CREATE  | ZIPARCHIVE::OVERWRITE)===TRUE){
        foreach ($galerie as $photo){
            //dd($path.$photo->urlImage);
            $zip->addFile( $photo->urlImage);

        } //dd($zip);
        }else{
            echo 'echec';
        }
       // dd($zip);
        $zip->close();

        return response()->download($id_activite.'.zip');
    }
}
