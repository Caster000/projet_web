<!-- NAVBAR-->

<div class="row  menu navbarbody mb-4">



        <nav class="navbar navbar-expand-lg navbar-custom col-12 p-0">
            <div class="col-lg-2 col-sm-3 col-md-3">
                <img class="mr-3" src="/projet_web//public/images/logo-CESI.png" width="170" alt="Logo CESI">
            </div>
            <a href="{{route('accueil')}}" class="navbar-brand col-3 ">
                <!-- Logo Text -->
                <span class="text-uppercase font-weight-bold   navbarbody">BDE CESI</span>
            </a>


            <button class="navbarcolotoggler navbar-toggler mr-4" type="button" data-toggle="collapse"
                    data-target="#collapsibleNavbar">Menu

            </button>

            <div class="collapse navbar-collapse font-weight-bold  col-6 " id="collapsibleNavbar">
                <div class="col-6">
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a class="nav-link" href={{route('accueil')}}>Accueil<span class="sr-only">(current)</span></a>
                    </li>
                    <li class="nav-item ">
                        <a class="nav-link " href={{route('activites')}}>Activités<span class="sr-only">(current)</span></a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href={{route('boutique')}}>Boutique</a>
                    </li>
                </ul>
                @if (Session::get('cookieConsent',0) != 1)
                    <div id="cookieConsent">
                        <div id="closeCookieConsent"></div>
                        En navigant sur ce site, vous acceptez l'utilisation des cookies de navigation et les conditions
                        générales d'utilisation.
                        <a href={{route('mentions_legales')}} target="_blank">&nbsp; Plus d'informations</a>
                        <form action={{route('cookieConsent')}} method="post">   {{csrf_field()}}
                            <input class="cookieConsentOK" type="submit" class="submitcookie" value="Très Bien"/></form>
                        <a class="cookieConsentOK" href="https://www.google.fr">Non Merci (retour a Google)</a>
                    </div>

            @endif
            </div>
            <div class="col-4 font-weight-bold connect">
                <ul class="navbar-nav ">
                    @if (Route::has('login'))
                        @auth
                            <li class="nav-item mr-4 ">
                                <a href="{{ url('/boutique/panier') }}" ><span class="fa fa-shopping-bag ">&nbsp;&nbsp;Panier</span></a>
                            </li>
                            <li class="nav-item">
                                <a href="{{ url('/logout') }}" ><span class="fa fa-sign-out ">&nbsp;Déconnexion</span></a>
                            </li>
                        @else
                            <li class="nav-item mr-2 ">
                                <a href="{{ route('login') }}">Connexion</a>
                            </li>
                            @if (Route::has('register'))
                                <li class="nav-item">
                                    <a href="{{ route('register') }}">Inscription</a>
                                </li>
                        @endif
                    @endauth
                @endif
                <!--
                    <li class="nav-item">
                        <a class="nav-link">Inscription</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link">Connexion</a>
                    </li>-->
                </ul>
                <!--<form class="form-inline my-2 my-lg-0">
                    <input class="form-control mr-sm-2" type="search" placeholder="CESI !" aria-label="Search">
                    <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Rechercher</button>
                </form> -->
            </div>

            </div>
        </nav>

</div>



