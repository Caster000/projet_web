@extends('layouts.master')

@section('content')

    <div class=" flex-center">
        @if (Route::has('login'))

        @endif

        <div class="content full-height">
            <div class="title pb-5">
                Panier
            </div>

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
                                        <tr>
                                            <th scope="row" class="border-0">
                                                <div class="p-2">
                                                    <img src="../images/article/Tshirt.png" alt="Article 1" width="70" class="img-fluid rounded shadow-sm">
                                                    <div class="ml-3 d-inline-block align-middle">
                                                        <h5 class="mb-0"> <a href="#" class="text-dark d-inline-block align-middle">Simple Tshirt blanc</a></h5><span class="text-muted font-weight-normal font-italic d-block">Catégorie : Tshirt</span>
                                                    </div>
                                                </div>
                                            </th>
                                            <td class="border-0 align-middle"><strong>$79.00</strong></td>
                                            <td class="border-0 align-middle"><strong>3</strong></td>
                                            <td class="border-0 align-middle"><a href="#" class="text-dark"><i class="fa fa-trash"></i></a></td>
                                        </tr>
                                        <tr>
                                            <th scope="row">
                                                <div class="p-2">
                                                    <img src="../images/article/sweatshirt.jpg" alt="Article 2" width="70" class="img-fluid rounded shadow-sm">
                                                    <div class="ml-3 d-inline-block align-middle">
                                                        <h5 class="mb-0"><a href="#" class="text-dark d-inline-block">Pull BDE</a></h5><span class="text-muted font-weight-normal font-italic">Catégorie : Pull</span>
                                                    </div>
                                                </div>
                                            </th>
                                            <td class="align-middle"><strong>$79.00</strong></td>
                                            <td class="align-middle"><strong>3</strong></td>
                                            <td class="align-middle"><a href="#" class="text-dark"><i class="fa fa-trash"></i></a>
                                            </td>
                                        </tr>
                                        <tr>
                                            <th scope="row">
                                                <div class="p-2">
                                                    <img src="../images/article/porteclef.jpg" alt="Article 3" width="70" class="img-fluid rounded shadow-sm">
                                                    <div class="ml-3 d-inline-block align-middle">
                                                        <h5 class="mb-0"> <a href="#" class="text-dark d-inline-block">Lot de porte clé</a></h5><span class="text-muted font-weight-normal font-italic">Categorie: Porte clé</span>
                                                    </div>
                                                </div>
                                            <td class="align-middle"><strong>$79.00</strong></td>
                                            <td class="align-middle"><strong>3</strong></td>
                                            <td class="align-middle"><a href="#" class="text-dark"><i class="fa fa-trash"></i></a>
                                            </td>
                                        </tr>
                                        </tbody>
                                    </table>
                                </div>

                            </div>


                        <div class="row bg-white rounded shadow-sm col-6">

                            <div class="">
                                <div class="bg-light rounded-pill px-4 py-3 text-uppercase font-weight-bold">Récapitulatif de commande</div>
                                <div class="p-4">
                                    <p class="font-italic mb-4">
                                        Les frais d’expédition et les frais supplémentaires sont calculés en fonction des valeurs que vous avez entrées.</p>
                                    <ul class="list-unstyled mb-4">
                                        <li class="d-flex justify-content-between py-3 border-bottom"><strong class="text-muted">Prix des articles </strong><strong>$390.00</strong></li>
                                        <li class="d-flex justify-content-between py-3 border-bottom"><strong class="text-muted">Frais de port</strong><strong>$10.00</strong></li>
                                        <li class="d-flex justify-content-between py-3 border-bottom"><strong class="text-muted">Taxe</strong><strong>$0.00</strong></li>
                                        <li class="d-flex justify-content-between py-3 border-bottom"><strong class="text-muted">Total</strong>
                                            <h5 class="font-weight-bold">$400.00</h5>
                                        </li>
                                    </ul><a href="#" class="btn btn-dark rounded-pill py-2 btn-block">Proceder au payement</a>
                                </div>
                            </div>
                        </div>
                        </div>
                    </div>
                </div>
            </div>
@endsection
