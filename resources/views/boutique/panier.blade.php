@extends('layouts.master')

@section('content')


    @if (Route::has('login'))

    @endif


    <div class="title text-center pb-5">
        Panier
    </div>
    @if($articles->isEmpty())
        <div class="row m-4 p-4">
            <div class="col-lg-6 offset-3 text-center">
                <div class="text-bold">
                    Pas d'article dans votre panier !
                    <br>
                    Allez visiter la boutique !!
                    <hr>
                </div>
            </div>
            <div>
                &nbsp
            </div>
            <div class="col-lg-12 text-center">
                <img
                    src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcQSKuxfXksQIPvXRbB5h9sEBM3HC-GuLqmG1MRI2-RrWu8q8o8i&s"
                    alt="" class="img-fluid">
            </div>
        </div>
    @else
        <div class="content full-height">
            <div class="container">
                <div class="row col-12">
                    <div class="bg-white rounded shadow-smrow col-6">

                        <!-- Shopping cart table -->
                        <div class="table-responsive">
                            <table class="table">
                                <thead>
                                <tr>
                                    <th scope="col" class="border-0 bg-light">
                                        <div class="p-2 px-3 text-uppercase">Produit</div>
                                    </th>
                                    <th scope="col" class="border-0 bg-light">
                                        <div class="py-2 text-uppercase">Prix</div>
                                    </th>
                                    <th scope="col" class="border-0 bg-light">
                                        <div class="py-2 text-uppercase">Quantité</div>
                                    </th>
                                    <th scope="col" class="border-0 bg-light">
                                        <div class="py-2 text-uppercase">Supprimer</div>
                                    </th>
                                </tr>
                                </thead>

                                <tbody>
                                @foreach($articles as $article)
                                    <tr>
                                        <th scope="row" class="border-0">
                                            <div class="p-2">
                                                <img src="{{$article->urlImage}}" alt="Article 1" width="70"
                                                     class="img-fluid rounded shadow-sm">
                                                <div class="ml-3 d-inline-block align-middle">
                                                    <h5 class="mb-0"><a href="#"
                                                                        class="text-dark d-inline-block align-middle">{{$article->nom}}</a>
                                                    </h5><span
                                                        class="text-muted font-weight-normal font-italic d-block">Catégorie : {{$article->categorie}}</span>
                                                </div>
                                            </div>
                                        </th>
                                        <td class="border-0 align-middle"><strong>{{$article->prix}}€</strong></td>
                                        <td class="border-0 align-middle"><strong>{{$article->quantite}}</strong></td>
                                        <td class="border-0 align-middle"><a href="#" class="text-dark"><i
                                                    class="fa fa-trash"></i></a></td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                    @endforeach
                    <div class=" bg-white rounded shadow-sm col-6">
                            <div class="bg-light rounded-pill px-4 py-3 text-uppercase font-weight-bold">Récapitulatif
                                de commande
                            </div>
                            <div class="p-4">
                                <p class="font-italic mb-4">
                                    Les frais d’expédition et les frais supplémentaires sont calculés en fonction des
                                    valeurs que vous avez entrées.</p>
                                <ul class="list-unstyled mb-4">
                                    <li class="d-flex justify-content-between py-3 border-bottom"><strong
                                            class="text-muted">Prix des articles </strong><strong>{{$totale}}€</strong></li>
                                    <li class="d-flex justify-content-between py-3 border-bottom"><strong
                                            class="text-muted">Frais de port</strong><strong>10€</strong></li>
                                    <li class="d-flex justify-content-between py-3 border-bottom"><strong
                                            class="text-muted">Taxe</strong><strong>0€</strong></li>
                                    <li class="d-flex justify-content-between py-3 border-bottom"><strong
                                            class="text-muted">Total</strong>
                                        <h5 class="font-weight-bold">{{$totale + 10}}€</h5>
                                    </li>
                                </ul>
                                <a href="#" class="btn btn-dark rounded-pill py-2 btn-block">Proceder au payement</a>
                            </div>
                    </div>


                </div>
            </div>
        </div>
    @endif

@endsection
