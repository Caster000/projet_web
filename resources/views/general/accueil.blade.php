@extends('layouts.master')

@section('title', 'Accueil')

@section('ajoutHead')
    <meta name="csrf-token" content="{{ csrf_token() }}">
@endsection

@section('content')

<div class="row">
        <div class="carousel slide col-12 justify-content-center carousel-fade p-0" data-ride="carousel">
            <div class="carousel-inner">
                <div class="carousel-item active">
                    <img class="d-block w-100" src="/projet_web/public/images/Carousel/CESI_Campus_JPO.png" alt="First slide">
                </div>
                <div class="carousel-item">
                    <img class="d-block w-100" src="/projet_web/public/images/Carousel/battledev_2018.jpg" alt="Second slide">
                </div>
                <div class="carousel-item">
                    <img class="d-block w-100" src="/projet_web/public/images/Carousel/smash_tournoi.jpg" alt="Third slide">
                </div>
            </div>
    </div>
</div>
<div class="row justify-content-center mt-3 mb-3">
    <div class="col-10 card border border-primary ">
        <h5 class="card-header ">Featured</h5>
        <div class="card-body">
            <div class="row justify-content-center">
                <div class="col-sm-6  col-md-4 col-lg-3 m-2 card" style="width: 18rem;">
                    <img class="card-img-top" src="/projet_web/public/images/activite/activite1.png" alt="Card image cap">
                    <div class="card-body">
                        <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                    </div>
                </div>
                <div class="col-sm-6  col-md-4 col-lg-3 m-2 card" style="width: 18rem;">
                    <img class="card-img-top" src="/projet_web/public/images/activite/activite1.png" alt="Card image cap">
                    <div class="card-body">
                        <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                    </div>
                </div>
                <div class="col-sm-6  col-md-4 col-lg-3 m-2 card" style="width: 18rem;">
                    <img class="card-img-top" src="/projet_web/public/images/activite/activite1.png" alt="Card image cap">
                    <div class="card-body">
                        <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
