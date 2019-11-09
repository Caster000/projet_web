@extends('layouts.master')

@section('content')

<link rel="stylesheet" type="text/css" href="../public/css/activite.css">

<div class="flex-center position-ref full-height">
    @if (Route::has('login'))
    <div class="top-right links">
        @auth
        <a href="{{ url('/home') }}">Home</a>
        @else
        <a href="{{ route('login') }}">Login</a>

        @if (Route::has('register'))
        <a href="{{ route('register') }}">Register</a>
        @endif
        @endauth
    </div>
    @endif
    <div class="content">
        <div class="title m-b-md">
            @if(isset($numero))
            Activité {{$numero}}
            @else
            Activités
            @endif
        </div>

        <div class="row flex-center">
            <div class="col-sm-6 col-md-4 col-lg-3 mt-2 mb-4 ">
                <div class="card card-inverse card-info ">
                    <img class="card-img-top" src="images/activite/activite1.png">
                    <div class="card-block">
                        <h4 class="card-title">Activité 1</h4>
                        <div class="card-text">
                            Description de l'activité 1.
                        </div>
                    </div>
                    <div class="card-footer">
                        <button class="btn btn-info btn-sm">En savoir plus</button>
                        <button class="btn btn-danger btn-sm">Supprimer</button>
                    </div>
                </div>
            </div>

            <div class="col-sm-6 col-md-4 col-lg-3 mt-2 mb-4">
                <div class="card card-inverse card-info">
                    <img class="card-img-top" src="images/activite/activite22.png">
                    <div class="card-block">
                        <h4 class="card-title">Activité 2</h4>
                        <div class="card-text">
                            Description de l'activite 2
                        </div>
                    </div>
                    <div class="card-footer">
                        <button class="btn btn-info btn-sm">En savoir plus</button>
                    </div>
                </div>
            </div>
            <div class="col-sm-6 col-md-4 col-lg-3 mt-2 mb-4">
                <div class="card card-inverse card-info">
                    <img class="card-img-top" src="images/activite/activite3.png">
                    <div class="card-block">
                        <h4 class="card-title">Activite 3</h4>
                        <div class="card-text">
                            Description de l'activité 3
                        </div>
                    </div>
                    <div class="card-footer">
                        <button class="btn btn-info btn-sm">En savoir plus</button>
                    </div>
                </div>
            </div>
            <div class="col-sm-6 col-md-4 col-lg-3 mt-2 mb-4">
                <div class="card card-inverse card-info">
                    <img class="card-img-top" src="images/activite/activite4.png">
                    <div class="card-block">
                        <h4 class="card-title">Activite 4</h4>
                        <div class="card-text">
                            Description de l'activité 4
                        </div>
                    </div>
                    <div class="card-footer">
                        <button class="btn btn-info btn-sm">En savoir plus</button>
                    </div>
                </div>
            </div>


        </div>



</div>

<div>

    <br>
    <hr>

    <hr>
            <!--Checker si on affiche la page en administrateur ou pas. Ceci est intéressant car permet à un admin
                de se connecter comme un simple utilisateur ou un admin selon la route utilisée-->
            </div>
        </div>

    @endsection
