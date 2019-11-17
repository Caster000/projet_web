@extends('layouts.master')

@section('styleParticulier')
    <link rel="stylesheet" type="text/css" href="../public/css/activite.css">
@endsection

@section('title', 'Activites')
@section('content')

        <div class="title mb-3">Activités</div>

        <div class="row flex-center">
            <a class="btn btn-primary btn-md mr-2" href="{{route('evenementsPasses')}}">Évènements passés</a>
            <a class="btn btn-primary btn-md mr-2 ml-2" href="{{route('activites')}}">Tous les évènements</a>
            <a class="btn btn-primary btn-md ml-2" href="{{route('evenementsDuMois')}}">Évènements du mois</a>
        </div>
        {{-- Affichage pour le cesi et le bde --}}
        <div class="row flex-center">
          @if(auth()->check() && (auth()->user()->id_role===\App\Role::where('role','BDE')->first()->id_role || auth()->user()->id_role===\App\Role::where('role','CESI')->first()->id_role)){{--  Check si connecté, si BDE ou si CESI --}}
              @foreach($activites as $activite)             {{--Boucle affichage des activites  --}}
                        <div class="col-sm-6 col-md-4 col-lg-3 mt-2 mb-4 ">
                            <div class="card card-inverse card-info">
                                <a href="{{ URL::action('ActivitesController@activiteNumero',  $activite->id_activite) }}">
                                    <img class="card-img-top" src="{{$activite->urlImage}}" alt="image d'activite {{$activite->id_activite}}">
                                </a>
                                <div class="card-block card-size-standard">
                                    <h4 class="card-title text-center">{{$activite->activite}}@if(($activite->prix)!=0), {{$activite->prix}}€@endif</h4>
                                    <div class="card-text">
                                        <div class="row" >
                                            <div class="col-6 text-left text-bold m-0 p-0" >{{$activite->recurrence}}</div>
                                            <div class="col-6 text-right m-0 p-0" >{{$activite->date}}</div>
                                        </div>
                                        <div class="description mt-1">
                                            {{$activite->description}}
                                        </div>
                                    </div>
                                </div>
                                <div class="card-footer text-center">
                                    <a class="btn btn-info btn-sm" href="{{ URL::action('ActivitesController@activiteNumero',  $activite->id_activite) }}">En savoir plus</a>
                                    @if($activite->visible===1)             {{-- Verification de la visibilité des activités --}}
                                        @if((\App\Inscrire::where('id_activite', $activite->id_activite)->where('id_personne', auth()->user()->id_personne)->first()))             {{-- Check si inscrit --}}
                                            <a class="btn btn-primary btn-sm" href="{{ URL::action('ActivitesController@desinscription',  $activite->id_activite) }}">Se désinscrire</a>             {{-- Possibilite de se desinscrire --}}
                                        @else
                                            <a class="btn btn-primary btn-sm" href="{{ URL::action('ActivitesController@inscription',  $activite->id_activite) }}">S'inscrire</a>             {{-- Possibilité de s'inscrire --}}
                                        @endif
                                    @endif
                                    @if(auth()->user()->id_role===\App\Role::where('role','BDE')->first()->id_role)             {{-- check si appartient au bde pour afficher le panel d'admin --}}
                                        <a class="btn btn-danger btn-sm" href="{{ URL::action('ActivitesController@delete',  $activite->id_activite) }}">Supprimer</a>
                                    @endif
                                    @if(!($activite->visible===1))             {{-- Panel admin de la visibilite --}}
                                        <a class="btn btn-warning btn-sm col-lg-7 text-bold" href="{{route('activiteRendreVisible', $activite->id_activite)}}">Invisible</a>
                                    @else
                                        <a class="btn btn-warning btn-sm col-lg-3 text-bold" href="{{route('activiteRendreInvisible', $activite->id_activite)}}">Visible</a>
                                    @endif
                                </div>
                            </div>
                        </div>
                @endforeach
            @else             {{-- affichage de base --}}
                @foreach($activites as $activite)
                    @if($activite->visible===1)
                        <div class="col-sm-6 col-md-4 col-lg-3 mt-2 mb-4 ">
                            <div class="card card-inverse card-info ">
                                <a href="{{ URL::action('ActivitesController@activiteNumero',  $activite->id_activite) }}">
                                    <img class="card-img-top" src="{{$activite->urlImage}}" alt="image d'activite {{$activite->id_activite}}">
                                </a>
                                <div class="card-block card-size-standard">
                                    <h4 class="card-title text-center">{{$activite->activite}}@if(($activite->prix)!=0), {{$activite->prix}}€@endif</h4>
                                    <div class="card-text">
                                        <div class="row" >
                                            <div class="col-6 text-left text-bold m-0 p-0" >{{$activite->recurrence}}</div>
                                            <div class="col-6 text-right m-0 p-0" >{{$activite->date}}</div>
                                        </div>
                                        {{$activite->description}}
                                    </div>
                                </div>
                                <div class="card-footer text-center">
                                    <a class="btn btn-info btn-sm" href="{{ URL::action('ActivitesController@activiteNumero',  $activite->id_activite) }}">En savoir plus</a>
                                    @if(auth()->check())                 {{-- Possibilite de s'inscrire/desinscrire --}}
                                        @if((\App\Inscrire::where('id_activite', $activite->id_activite)->where('id_personne', auth()->user()->id_personne)->first()))
                                            <a class="btn btn-primary btn-sm" href="{{ URL::action('ActivitesController@desinscription',  $activite->id_activite) }}">Se désinscrire</a>
                                        @else
                                            <a class="btn btn-primary btn-sm" href="{{ URL::action('ActivitesController@inscription',  $activite->id_activite) }}">S'inscrire</a>
                                        @endif
                                    @endif
                                </div>
                            </div>
                        </div>
                    @endif
                @endforeach
            @endif
        </div>

@if(auth()->check() && auth()->user()->id_role===\App\Role::where('role','BDE')->first()->id_role)             {{-- Pannel admin pour ajouter/modifier  --}}
    @include('activites.admin_panel')
@endif
<!--Checker si on affiche la page en administrateur ou pas. Ceci est intéressant car permet à un admin
    de se connecter comme un simple utilisateur ou un admin selon la route utilisée-->
@endsection
