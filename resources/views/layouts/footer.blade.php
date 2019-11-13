<!-- Footer -->
<footer class="page-footer footerbody pt-4 ">
    <div class="container  text-center text-md-left">
        <div class="row text-center text-md-left mt-3 pb-3">
            <div class="col-md-3 col-lg-3 col-xl-3 mx-auto mt-3">
                <h6 class="text-uppercase mb-4 font-weight-bold">Bureau Des Étudiants du CESI</h6>
                <p>Venez nous rencontrer en salle 100 !</p>
                <p>
                    <a href="https://www.cesi.fr/">Site du CESI</a>
                </p>
            </div>

            <hr class="w-100 clearfix d-md-none">
            <div class="col-md-3 col-lg-2 col-xl-2 mx-auto mt-3">
                <h6 class="text-uppercase mb-4 font-weight-bold">Navigation</h6>
                @if(auth()->check())
                <p>
                    <a href="{{route('panier')}}">Votre panier</a>
                </p>
                @endif
                <p>
                    <a href="{{route('boutique')}}">Accès à la boutique</a>
                </p>
                <p>
                    <a href="{{route('activites')}}">Accès aux activités</a>
                </p>
            </div>


            <hr class="w-100 clearfix d-md-none">
            <div class="col-md-4 col-lg-3 col-xl-3 mx-auto mt-3">
                <h6 class="text-uppercase mb-4 font-weight-bold">Contact</h6>
                <p>19 Avenue Guy de Collongue <br>
                    69130 Écully</p>
                <p><a href="mailto:baptiste.chevallier@viacesi.fr">bde-lyon@viacesi.fr</a></p>
                <p>0 800 054 568</p>
            </div>

            <hr class="w-100 clearfix d-md-none">
            <div class="col-md-2 col-lg-2 col-xl-2 mx-auto mt-3 MarginPading">
                <h6 class="text-uppercase mb-4 font-weight-bold">Statut légal</h6>
                <p>
                    <a href="{{route('mentions_legales')}}">Mentions légales</a>
                </p>
                <p>
                    <a href="{{route('conditions')}}">Condition générales</a>
                </p>
                <p>
                    <a href="{{route('cgv')}}">CGV</a>
                </p>
            </div>

        </div>


        <hr>
        <div class="row d-flex align-items-center">
            <div class="mx-auto">
                <!--Copyright-->
                <p class="text-center text-md-left">© 2018 Copyright:
                    <a href="{{route('accueil')}}">
                        <strong>BDE CESI</strong>
                    </a>
                </p>
            </div>
        </div>
    </div>
</footer>
<!-- Footer -->
