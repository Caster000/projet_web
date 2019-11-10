@extends('layouts.master')

@section('content')
    @if($activite)
        <div class="row m-4 p-4">
            <div class="col-sm-5 col-md-4 col-lg-5">
                <img src="{{$activite->urlImage}}" alt="" class="img-fluid">
            </div>
            <div class="col-sm-5 col-md-3 col-lg-5">
                <h4>{{$activite->nom}}</h4>
                <h6 class="mt-2">Description :</h6>
                <div>
                    {{$activite->description}}
                </div>
                <h6 class="mt-4">Prix :</h6>
                <di>
                    {{$activite->prix}}€
                </di>
            </div>
            <div class="col-lg-2 col-sm-2 col-md-2">
                <span><a class="btn btn-warning" data-toggle="button" aria-pressed="false"><span class="fa fa-shopping-cart fa-lg"></span>&nbspParticiper</a></span>
                <!-- ADMIN BOUTON -->
                <button class="btn btn-info" data-toggle="button" aria-pressed="false"><span class="fa .fa-pencil fa-lg"></span>Modifier l'article</button>
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
            <div>
                &nbsp
            </div>
            <div class="col-lg-12 text-center">
                <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcQSKuxfXksQIPvXRbB5h9sEBM3HC-GuLqmG1MRI2-RrWu8q8o8i&s" alt="" class="img-fluid">
            </div>
        </div>
    @endif
@endsection
