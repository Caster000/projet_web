@extends('layouts.master')

@section('content')

<link rel="stylesheet" type="text/css" href="../public/css/activite.css">

        <div class="row flex-center">
            @foreach($activites as $activite)
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
                        <a href="{{ URL::action('ActivitesController@inscrire',  $activite->id_activite) }}"><button class="btn btn-primary btn-sm">S'inscrire</button></a>
                            @if(auth()->user()->id_role===\App\Role::where('role','BDE')->first()->id_role)
                            <a href="{{ URL::action('ActivitesController@delete',  $activite->id_activite) }}"><button class="btn btn-danger btn-sm" >Supprimer</button></a>
                            @endif
                        @endif
                    </div>
                </div>
            </div>
            @endforeach

        </div>
@if(auth()->check() && auth()->user()->id_role===\App\Role::where('role','BDE')->first()->id_role)
    @include('activites.admin_panel')
@endif
<!--Checker si on affiche la page en administrateur ou pas. Ceci est intéressant car permet à un admin
    de se connecter comme un simple utilisateur ou un admin selon la route utilisée-->
@endsection
