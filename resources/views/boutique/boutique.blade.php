@extends('layouts.master')
@section('title','Boutique')
@section('content')
    @include('layouts.cesi_graphique')

    <div class="content">
        <div class="title mb-3">
            Boutique
        </div>
        <!-- A grey horizontal navbar that becomes vertical on small screens -->
        <!--Navbar-->
        <nav class="navbar navbar-expand-lg navbar-custom">
            <!-- Collapse button -->
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#basicExampleNav"
                    aria-controls="basicExampleNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <!-- Collapsible content -->
            <div class="collapse navbar-collapse" id="basicExampleNav">

                <!-- Links -->
                <ul class="navbar-nav mr-auto">
                    <li class="nav-item">
                        <a class="nav-link" href="#">Top 3 des ventes</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Catalogue</a>
                    </li>

                    <!-- Dropdown -->
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" id="navbarDropdownMenuLink" data-toggle="dropdown"
                           aria-haspopup="true" aria-expanded="false">Trier les articles par prix</a>
                        <div class="dropdown-menu dropdown-primary" aria-labelledby="navbarDropdownMenuLink">
                            <a class="dropdown-item" href="#">Par prix croissant</a>
                            <a class="dropdown-item" href="#">Par prix décroissant</a>

                        </div>
                    </li>

                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" id="navbarDropdownMenuLink" data-toggle="dropdown"
                           aria-haspopup="true" aria-expanded="false">Trier les articles par catégories</a>
                        <div class="dropdown-menu dropdown-primary" aria-labelledby="navbarDropdownMenuLink">
                            <a class="dropdown-item" href="#">T-Shirt</a>
                            <a class="dropdown-item" href="#">Sweat-shirt</a>
                            <a class="dropdown-item" href="#">Casquette</a>
                            <a class="dropdown-item" href="#">Goodies</a>
                            <a class="dropdown-item" href="#">Ajout de nom avant soutenance</a>

                        </div>
                    </li>
                </ul>
                <!-- Links -->

                <form class="form-inline">
                    <div class="md-form my-0">
                        <input class="form-control mr-sm-2" type="text" placeholder="Search" aria-label="Search">
                    </div>
                </form>
            </div>
            <!-- Collapsible content -->

        </nav>

        <hr>
        <div class="display-4 text-center text-danger p-md-3">
            Le top 3 de nos articles
        </div>

        <div class="row flex-center">
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
    </div>
    </div>
    <hr>

    <div class="display-4 text-center text-danger p-md-3">
        <hr class="hrtaille">
        Notre catalogue d'articles :
    </div>
    <!--4 articles-->
    <div class="flex-center">
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

<!--2 articles-->
    <div class="flex-center">
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


    <!--3 articles-->
    <div class="flex-center">
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
    <!--4 articles-->
    <div class="flex-center">
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
    <!--4 articles-->
    <div class="flex-center">
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

    <!-- ATTENTION RAPPEL pour l'espace administrateur quand nous sommes membres avec un if ou foreach -->



@endsection
