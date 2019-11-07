<!-- NAVBAR-->
<div class="row">
<div class="col-2 pl-2 mt-2" >
<img src="../public/images/CESILOGO.png" width="90%" alt="Logo CESI">
</div>
<nav class="navbar navbar-expand-lg col-10 navbar-dark bg-primary ">

        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarTogglerDemo03" aria-controls="navbarTogglerDemo03" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="navbar-brand ">
            <!-- Logo Text -->
            <span class="text-uppercase font-weight-bold mr-auto">BDE CESI</span>
        </div>
        <div class="collapse navbar-collapse " id="navbarTogglerDemo03">
                <ul class="navbar-nav navbar-center">
                    <li class="nav-item ">
                        <a class="nav-link" href={{route('activites')}}>Activités<span class="sr-only">(current)</span></a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href={{route('boutique')}}>Boutique</a>
                    </li>
                </ul>
        </div>
            <div class="collapse navbar-collapse " id="navbarTogglerDemo03">
                <ul class="navbar-nav text-white ml-auto">
                    <li class="nav-item text-white">
                        <a class="nav-link">Inscription</a>
                    </li>
                    <li class="nav-item text-white">
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
<style>
    .navbar-center {
        position: absolute;
        left: 50%;
        transform: translatex(-50%);
    }
    .row{
        margin-right: 0;
        margin-left: 0;
    }
</style>

