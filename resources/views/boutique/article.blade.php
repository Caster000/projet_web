@extends('layouts.master')

@section('content')

<div class="row m-4 p-4">
    <div class="col-sm-5 col-md-4 col-lg-5">
        <img src="/projet_web/public/images/Tshirt.png" alt="" class="img-fluid">
    </div>
    <div class="col-sm-5 col-md-3 col-lg-5">
        <h4>Super T-shirt</h4>
        <h6 class="mt-2">Description :</h6>
        <div>
            Bah il est blanc et c'est bien le blanc
        </div>
        <h6 class="mt-4">Prix :</h6>
        <di>
            69,37 €
        </di>
    </div>
    <div class="col-lg-2 col-sm-2 col-md-2">
        <button class="btn btn-warning" data-toggle="button" aria-pressed="false"><span class="fa fa-shopping-cart fa-lg"></span>     Ajouter au panier</button>
        <button class="btn btn-info mt-4" data-toggle="button" aria-pressed="false"><span class="fa .fa-pencil fa-lg"></span>     Modifier l'article</button>
    </div>
</div>

@endsection
