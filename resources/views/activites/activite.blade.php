@extends('layouts.master')

@section('title', $activite->activite)

@section('content')
    @if($activite && ($activite->visible===1 || auth()->check() && (auth()->user()->id_role===\App\Role::where('role','BDE')->first()->id_role || auth()->user()->id_role===\App\Role::where('role','CESI')->first()->id_role)))
        <div class="row m-4 p-4">
            <div class="col-sm-5 col-md-4 col-lg-5">
                <img src="{{$activite->urlImage}}" alt="" class="img-fluid">
            </div>
            <div class="col-sm-5 col-md-3 col-lg-5">
                <h4>{{$activite->activite}}</h4>
                <h6 class="mt-2">Description :</h6>
                <div>
                    {{$activite->description}}
                </div>
                @if(($activite->prix)!=0)
                <h6 class="mt-4">Prix :</h6>
                <div>
                    {{$activite->prix}}€
                </div>
                @endif
            </div>
            <div class="col-lg-2 col-sm-2 col-md-2">
                <div class="text-center mb-3">
                    <a class="btn btn-primary" href="{{ route('activites') }}" aria-pressed="false"><span class="fa fa-arrow-circle-left"></span>&nbspRetour aux activités</a>
                </div>
            @if(auth()->check())
                <div class="text-center">
                    @if((\App\Inscrire::where('id_activite', $activite->id_activite)->where('id_personne', auth()->user()->id_personne)->first()))
                        <a class="btn btn-warning" href="{{ URL::action('ActivitesController@desinscription',  $activite->id_activite) }}" aria-pressed="false"><span class="fa fa-times fa-lg"></span>&nbspSe raviser</a>
                    @else
                        <a class="btn btn-warning" href="{{ URL::action('ActivitesController@inscription',  $activite->id_activite) }}" aria-pressed="false"><span class="fa fa-check fa-lg"></span>&nbspParticiper</a>
                    @endif
                <!-- ADMIN BOUTON -->
                @if(auth()->user()->id_role===\App\Role::where('role','BDE')->first()->id_role || auth()->user()->id_role===\App\Role::where('role','CESI')->first()->id_role)
                    <a href="{{ URL::action('ActivitesController@export',  $activite->id_activite) }}"  aria-pressed="false" class="btn btn-info m-3"><span class="fa fa-download fa-lg"></span> &nbspTélécharger la liste des inscrits</a>
                @endif
                </div>
                @if((\App\Inscrire::where('id_activite', $activite->id_activite)->where('id_personne', auth()->user()->id_personne)->first()) || auth()->user()->id_role===\App\Role::where('role','BDE')->first()->id_role || auth()->user()->id_role===\App\Role::where('role','CESI')->first()->id_role)
{{--                <div class="border border-primary p-4  mt-3">--}}
                    <h6 class="text-center text-bold mt-5">Ajouter une image</h6>
                    <form class="dropzone" paramName="file" action="{{ URL::action('PhotoController@addPhoto',  $activite->id_activite) }}" enctype="multipart/form-data" method="post">
                    @csrf <!-- {{ csrf_field() }} -->
{{--                        <div class=" mb-4 ">--}}
{{--                            <label class="mt-2" for="titre">Titre :</label>--}}
{{--                            <input type="text" class="form-control" placeholder="Ex: Tournoi Smash" name="titre" required>--}}
{{--                            <input class="mt-3" name="file" type="file" multiple required/>--}}
{{--                        </div>--}}
{{--                        <button type="submit" class="btn btn-primary">Ajouter des photos</button>--}}
                    </form>
{{--                </div>--}}
                    <a href="{{ URL::action('PhotoController@index',  $activite->id_activite) }}" class="btn btn-success mt-2">Voir la Galerie</a>
                @endif

            @endif
            </div>
    </div>
    @else
        <div class="row m-4 p-4">
            <div class="col-lg-6 offset-3 text-center">
                <div class="text-bold">
                    Oups ! Problème de livraison !
                    <br>
                    L'activité que vous cherchez n'est pas répertoriée ! Revenez plus tard...
                    <hr>
                </div>
            </div>

            <div class="col-lg-12 text-center">
                <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcQSKuxfXksQIPvXRbB5h9sEBM3HC-GuLqmG1MRI2-RrWu8q8o8i&s" alt="Chien retourné" class="img-fluid">
            </div>
        </div>

    @endif
@endsection
@section('addScripts')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/dropzone/5.5.1/dropzone.js"></script>
@endsection
