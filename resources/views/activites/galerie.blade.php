@extends('layouts.master')

@section('content')
@section('title', 'Galerie')

    <div class="mt-5 mr-5 ml-5">
        @if($galerie->isEmpty()|| $galerie->whereIn('visible',0)->all())
            <div class="row m-4 p-4">
                <div class="col-lg-6 offset-3 text-center">
                    <div class="text-bold">
                        Pas d'image dans la galerie !
                        <br>
                        Ajoutez-en !!<br>
                        <a class="btn btn-success mt-2" href=javascript:history.go(-1)><span class="fa fa-arrow-circle-left">&nbsp; Retour sur l'activité</span></a>
                        <hr>
                    </div>
                </div>
                <div>
                    &nbsp
                </div>
                <div class="col-lg-12 text-center">
                    <img
                        src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcQSKuxfXksQIPvXRbB5h9sEBM3HC-GuLqmG1MRI2-RrWu8q8o8i&s"
                        alt="" class="img-fluid">

                </div>

            </div>
        @else
            <a href="{{ URL::action('ActivitesController@activiteNumero',  $activite->id_activite) }}" class="btn btn-success mb-5">
            <span class="fa fa-arrow-circle-left">&nbsp; Retour sur l'activité</span>
        </a>
        @if(auth()->user()->id_role===\App\Role::where('role','BDE')->first()->id_role || auth()->user()->id_role===\App\Role::where('role','CESI')->first()->id_role)
            <a href="{{ URL::action('PhotoController@export',  $activite->id_activite) }}" class="btn btn-info mb-5">
                <span class="fa fa-download">&nbsp; Télécharger les images</span>
            </a>
        @endif
    </div>
    <div class="row justify-content-center">
        @foreach($galerie as $photo)
            @if($photo->visible==1 || auth()->user()->id_role===\App\Role::where('role','BDE')->first()->id_role || auth()->user()->id_role===\App\Role::where('role','CESI')->first()->id_role)
                <div class="card col-lg-6 col-sm-4  mb-3 mr-4 ml-4 photo2 border border-dark">
                    <a href="{{ URL::action('PhotoController@image',  [$activite->id_activite,$photo->titre]) }}" data-lity><img
                            src="/projet_web/public/{{$photo->urlImage}}" class="card-img-top " alt="{{$photo->titre}}">
                    </a>
                    @if(auth()->user()->id_role===\App\Role::where('role','BDE')->first()->id_role)
                    <div class="row">
                        @if(!($photo->visible===1))
                            <a href="{{route('photoRendreVisible', $photo->id_photo)}}" class="btn btn-warning btn-sm col-lg-6 text-bold rounded-0">Invisible</a>
                        @else
                            <a href="{{route('photoRendreInvisible', $photo->id_photo)}}" class="btn btn-warning btn-sm col-lg-6 text-bold rounded-0">Visible</a>
                        @endif
                        <a href="{{route('deletePhoto',$photo->id_photo)}}" class="btn btn-danger btn-sm col-lg-6 rounded-0">Supprimer</a>
                    </div>
                    @elseif(auth()->user()->id_role===\App\Role::where('role','CESI')->first()->id_role)
                    <div class="row">
                        @if(!($photo->visible===1))
                            <a href="{{route('photoRendreVisible', $photo->id_photo)}}" class="btn btn-warning btn-sm col-lg-12 text-bold rounded-0">Invisible</a>
                        @else
                            <a href="{{route('photoRendreInvisible', $photo->id_photo)}}" class="btn btn-warning btn-sm col-lg-12 text-bold rounded-0">Visible</a>
                        @endif
                    </div>
                    @endif
                </div>
            @endif
        @endforeach
    </div>
@endif
@endsection
@section('addScripts')
@endsection
