@extends('layouts.master')

@section('styleParticulier')
    <link rel="stylesheet" type="text/css" href="../public/css/activite.css">
@endsection

@section('content')

        <div class="row flex-center">
            <a href="{{route('evenementsPasses')}}"><button class="btn btn-primary btn-md mr-2">Évènements passés</button></a>
            <a href="{{route('activites')}}"><button class="btn btn-primary btn-md mr-2 ml-2">Tous</button></a>
            <a href="{{route('evenementsDuMois')}}"><button class="btn btn-primary btn-md ml-2">Évènements du mois</button></a>
        </div>

        <div class="row flex-center">
            @if(auth()->check() && auth()->user()->id_role===\App\Role::where('role','BDE')->first()->id_role)
                @foreach($activites as $activite)
                        <div class="col-sm-6 col-md-4 col-lg-3 mt-2 mb-4 ">
                            <div class="card card-inverse card-info">
                                <img class="card-img-top" src="{{$activite->urlImage}}">
                                <div class="card-block">
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
                                    <a href="{{ URL::action('ActivitesController@activiteNumero',  $activite->id_activite) }}"><button class="btn btn-info btn-sm">En savoir plus</button></a>
                                    @if($activite->visible===1)
                                        @if((\App\Inscrire::where('id_activite', $activite->id_activite)->where('id_personne', auth()->user()->id_personne)->first()))
                                            <a href="{{ URL::action('ActivitesController@desinscription',  $activite->id_activite) }}"><button class="btn btn-primary btn-sm">Se désinscrire</button></a>
                                        @else
                                            <a href="{{ URL::action('ActivitesController@inscription',  $activite->id_activite) }}"><button class="btn btn-primary btn-sm">S'inscrire</button></a>
                                        @endif
                                    @endif
                                    <a href="{{ URL::action('ActivitesController@delete',  $activite->id_activite) }}"><button class="btn btn-danger btn-sm" >Supprimer</button></a>
                                    @if(!($activite->visible===1))
                                        <a href="{{route('activiteRendreVisible', $activite->id_activite)}}"><button class="btn btn-warning btn-sm col-lg-7 text-bold">Invisible</button></a>
                                    @else
                                        <a href="{{route('activiteRendreInvisible', $activite->id_activite)}}"><button class="btn btn-warning btn-sm col-lg-3 text-bold">Visible</button></a>
                                    @endif
                                </div>
                            </div>
                        </div>
                @endforeach
            @else
                @foreach($activites as $activite)
                    @if($activite->visible===1)
                        <div class="col-sm-6 col-md-4 col-lg-3 mt-2 mb-4 ">
                            <div class="card card-inverse card-info ">
                                <img class="card-img-top" src="{{$activite->urlImage}}">
                                <div class="card-block">
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
                                    <a href="{{ URL::action('ActivitesController@activiteNumero',  $activite->id_activite) }}"><button class="btn btn-info btn-sm">En savoir plus</button></a>
                                    @if(auth()->check())
                                        @if((\App\Inscrire::where('id_activite', $activite->id_activite)->where('id_personne', auth()->user()->id_personne)->first()))
                                            <a href="{{ URL::action('ActivitesController@desinscription',  $activite->id_activite) }}"><button class="btn btn-primary btn-sm">Se désinscrire</button></a>
                                        @else
                                            <a href="{{ URL::action('ActivitesController@inscription',  $activite->id_activite) }}"><button class="btn btn-primary btn-sm">S'inscrire</button></a>
                                        @endif
                                        @if(auth()->user()->id_role===\App\Role::where('role','BDE')->first()->id_role)
                                        <a href="{{ URL::action('ActivitesController@delete',  $activite->id_activite) }}"><button class="btn btn-danger btn-sm" >Supprimer</button></a>
                                        @endif
                                    @endif
                                </div>
                            </div>
                        </div>
                    @endif
                @endforeach
            @endif
        </div>
@if(auth()->check() && auth()->user()->id_role===\App\Role::where('role','BDE')->first()->id_role)
    @include('activites.admin_panel')
@endif
<!--Checker si on affiche la page en administrateur ou pas. Ceci est intéressant car permet à un admin
    de se connecter comme un simple utilisateur ou un admin selon la route utilisée-->
@endsection
