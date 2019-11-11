@extends('layouts.master')

@section('content')
    @if($activite)
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
                <h6 class="mt-4">Prix :</h6>
                <di>
                    {{$activite->prix}}€
                </di>
            </div>
            <div class="col-lg-2 col-sm-2 col-md-2">
                <a class="btn btn-warning" data-toggle="button" aria-pressed="false"><span class="fa fa-shopping-cart fa-lg"></span>&nbspParticiper</a>
                <!-- ADMIN BOUTON -->
                <button class="btn btn-info mt-4" data-toggle="button" aria-pressed="false"><span class="fa fa-pencil fa-lg"></span>&nbspModifier l'article</button>
                <div class="border border-primary p-4  mt-5">
                    <h6>Ajouter une image :</h6>
                    <form paramName="file" action="/projet_web/public/activites/{{$activite->id_activite}}" method="post" enctype="multipart/form-data" method="post">
                    @csrf <!-- {{ csrf_field() }} -->
                        <div class=" mb-4 ">
                            <label class="mt-2" for="titre">Titre :</label>
                            <input type="text" class="form-control" placeholder="Ex: Tournoi Smash" name="titre" required>
                            <input class="mt-3" name="file" type="file" multiple required/>
                        </div>
                        <button type="submit" class="btn btn-primary">Ajouter des photo</button>
                    </form>
                </div>
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
@section('addScripts')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/dropzone/5.5.1/dropzone.js"></script>
@endsection
