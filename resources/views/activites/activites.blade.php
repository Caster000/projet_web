@extends('layouts.master')

@section('content')

<link rel="stylesheet" type="text/css" href="../public/css/activite.css">

        <div class="row flex-center">
            @foreach($activites as $activite)
            <div class="col-sm-6 col-md-4 col-lg-3 mt-2 mb-4 ">
                <div class="card card-inverse card-info ">
                    <img class="card-img-top" src="{{$activite->urlImage}}">
                    <div class="card-block">
                        <h4 class="card-title text-center">{{$activite->activite}}, {{$activite->prix}}€</h4>
                        <div class="card-text">
                            <div class="row" style="margin:0px; padding:0px;">
                                <div class="col-6 text-left text-bold" style="margin:0px; padding:0px;">{{$activite->recurrence}}</div>
                                <div class="col-6 text-right" style="margin:0px; padding:0px;">{{$activite->date}}</div>
                            </div>
                            {{$activite->description}}
                        </div>
                    </div>
                    <div class="card-footer">
                        <button class="btn btn-info btn-sm">En savoir plus</button>
                        <button class="btn btn-danger btn-sm">Supprimer</button>
                    </div>
                </div>
            </div>
            @endforeach

        </div>

@include('activites.admin_panel')



<div>

    <br>
    <hr>

    <hr>
            <!--Checker si on affiche la page en administrateur ou pas. Ceci est intéressant car permet à un admin
                de se connecter comme un simple utilisateur ou un admin selon la route utilisée-->
            </div>
        </div>

    @endsection
