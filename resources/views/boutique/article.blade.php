@extends('layouts.master')

@section('content')
@section('title', 'article')
<a class="btn btn-success mt-2 ml-2" href=javascript:history.go(-1)><span
        class="fa fa-arrow-circle-left">&nbsp; Retour sur la boutique</span></a>
    @if($produit)
        <div class="row m-4 p-4">

            <div class="col-sm-5 col-md-4 col-lg-5">
                <img src="{{$produit->urlImage}}" alt="" class="img-fluid">
            </div>
            <div class="col-sm-5 col-md-3 col-lg-5">
                <h4>{{$produit->nom}}</h4>
                <h6 class="mt-2">Description :</h6>
                <div>
                    {{$produit->description}}
                </div>
                <h6 class="mt-4">Prix :</h6>
                <div>
                    {{$produit->prix}}€
                </div>
            </div>
            @if(auth()->check())
                <div class="col-lg-2 col-sm-2 col-md-2">
                    <a href="{{ URL::action('PanierController@addToPanier',  $produit->id_produit) }}"
                       class="btn btn-warning"><span class="fa fa-shopping-cart fa-lg"></span>&nbsp;Ajouter au panier</a>
                    @if(auth()->user()->id_role===\App\Role::where('role','BDE')->first()->id_role)

                    @endif
                </div>
            @endif
        </div>
    @else
        <div class="row m-4 p-4">
            <div class="col-lg-6 offset-3 text-center">
                <div class="text-bold">
                    Oups ! Problème de livraison !
                    <br>
                    Le produit que vous cherchez n'est pas répertorié ! Revenez plus tard...
                    <hr>
                </div>
            </div>
            <div>
                &nbsp;
            </div>
            <div class="col-lg-12 text-center">
                <img
                    src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcQSKuxfXksQIPvXRbB5h9sEBM3HC-GuLqmG1MRI2-RrWu8q8o8i&s"
                    alt="" class="img-fluid">
            </div>
        </div>
    @endif
@endsection

