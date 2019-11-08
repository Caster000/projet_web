<!-- NAVBAR-->


<div class="row m-1 menu navbarbody">
    <div class="col-2 pl-4 mt-2">
        <img src="../public/images/CESILOGO.png" width="50%" alt="Logo CESI">
    </div>
    <div class="col-10">
        <nav class="navbar navbar-expand-lg navbar-custom ">
            <a class="navbar-brand ">
                <!-- Logo Text -->
                <span class="text-uppercase font-weight-bold mr-auto navbarbody">BDE CESI</span>
            </a>


            <button class="navbarcolotoggler navbar-toggler ml-auto" type="button" data-toggle="collapse" data-target="#collapsibleNavbar">Menu

            </button>

            <div class="collapse navbar-collapse font-weight-bold " id="collapsibleNavbar">
                <ul class="navbar-nav  mx-auto">
                    <li class="nav-item ">
                        <a class="nav-link">Accueil<span class="sr-only">(current)</span></a>
                    </li>
                    <li class="nav-item ">
                        <a class="nav-link " href={{route('activites')}}>Activités<span class="sr-only">(current)</span></a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href={{route('boutique')}}>Boutique</a>
                    </li>
                </ul>


                <ul class="navbar-nav   ml-auto" >
                    <li class="nav-item">
                        <a class="nav-link">Inscription</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link">Connexion</a>
                    </li>
                </ul>
                <!--<form class="form-inline my-2 my-lg-0">
                    <input class="form-control mr-sm-2" type="search" placeholder="CESI !" aria-label="Search">
                    <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Rechercher</button>
                </form> -->
            </div>


        </nav>
    </div>
</div>



