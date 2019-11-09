@extends('layouts.master')
@section('title','Boutique')
@section('content')


    <div class="content">
        <div class="title mb-3">
            Boutique
        </div>


        <div class="container">
           <div class="btn-group pr-5">
                <div class="col-12 col-sm-4 col-lg-4 ">
                    <button type="button" class="btn btn-black dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        Trier vos articles par prix
                    </button>
                    <div class="dropdown-menu dropdown-menu-right">
                                <button class="dropdown-item" type="button">Par prix croissant</button>
                                <button class="dropdown-item" type="button">Par prix décroissant</button>
                    </div>
                </div>

                <div class="col-12 col-sm-6 col-lg-4">
                    <button type="button" class="btn btn-black dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        Trier vos articles par catégories
                    </button>
                    <div class="dropdown-menu dropdown-menu-right">
                        <button class="dropdown-item" type="button">T-shirt</button>
                        <button class="dropdown-item" type="button">Sweat-shirt</button>
                        <button class="dropdown-item" type="button">Casquette</button>
                        <button class="dropdown-item" type="button">Goodies</button>

                    </div>
                </div>
                <div class="col-12 col-sm-8 col-lg-4 pr-5 pl-5">
                    <form action="search" method="get" class="form-inline">
                        <div class="input-group">
                            <input type="text" name="search" class="form-control"
                                   placeholder="Recherche">
                            <span class="input-group-btn">
        <button type="submit" class="btn btn-secondary"><span class="fa fa-search"></span> Valider</button>
      </span>
                        </div>
                    </form>


                </div>
           </div>
        </div>
        <hr>
        <div class="display-4 text-center text-danger p-md-3">
            Le top 3 de nos articles
        </div>

        <div class="row flex-center">
            <div class="col-sm-6 col-md-4 col-lg-3 mt-2 mb-4 ">
                <div class="card card-inverse card-info ">
                    <img class="card-img-top" src="images/Tshirt.png">
                    <div class="card-block">
                        <h4 class="card-title">Casquette BDE</h4>
                        <div class="card-text">
                            Prener cette casquette après les soirées BDE pour vos cheveux !
                        </div>
                    </div>
                    <div class="card-footer">
                        <button class="btn btn-info btn-sm">Voir plus</button>
                    </div>
                </div>
            </div>

            <div class="col-sm-6 col-md-4 col-lg-3 mt-2 mb-4">
                <div class="card card-inverse card-info">
                    <img class="card-img-top" src="images/Tshirt.png">
                    <div class="card-block">
                        <h4 class="card-title">T-Shirt blanc BDE</h4>
                        <div class="card-text">
                            Le T-Shirt le plus commum mais il passe partout !
                        </div>
                    </div>
                    <div class="card-footer">
                        <button class="btn btn-info btn-sm">Voir plus</button>
                    </div>
                </div>
            </div>
            <div class="col-sm-6 col-md-4 col-lg-3 mt-2 mb-4">
                <div class="card card-inverse card-info">
                    <img class="card-img-top" src="images/Tshirt.png">
                    <div class="card-block">
                        <h4 class="card-title">Sweat Shirt BDE</h4>
                        <div class="card-text">
                            Ce sweatshirt vous tiendra bien au chaud durant l'hiver
                        </div>
                    </div>
                    <div class="card-footer">
                        <button class="btn btn-info btn-sm">Voir plus</button>
                    </div>
                </div>
            </div>


        </div>
    </div>



<br>
    @include('boutique.admin_panel')






    <!-- ATTENTION RAPPEL pour l'espace administrateur quand nous sommes membres avec un if ou foreach -->



@endsection
