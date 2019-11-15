
@extends('layouts.master')

@section('title', 'Accueil')

@section('ajoutHead')
<meta name="csrf-token" content="{{ csrf_token() }}">
@endsection
<div id="tout">
@section('content')
<!--div class="title mb-3">BDE CESI</div>

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
</div-->

<div class="container-fluid aaa">
	<div class="row-fluid" id="row1">&nbsp;</div>
	<div class="row" id="row2">
		<div class="col accueildiv" id="div1">
			<h2> Bureau des élèves</h2>
			<p class="accueiltext">
                Bienvenue sur le Site du Bureau des Élèves du CESI. Vous pourrez y trouver un espace pour consulter les
                différentes activités qui pourront avoir lieu lors de la vie étudiante le jeudi après midi, poster des
                photos et intéragir avec les activités auxquelles vous décidez de participer, ou encore réagir aux
                commentaires des autres participants.
            </p>
			<p class="accueiltext">
                Soyez sans crainte, les membres du BDE et l'équipe pédagogique s'occupent de se débarasser du contenu
                inapproprié, pour que vous puissiez visiter le site avec la meilleure expérience possible. N'hésitez pas
                à consulter les mentions légales si vous avez des questions et si elles n'y répondent pas, vous pouvez
                toujours nous les poser via les informations de contact en bas de page ou bien même venir nous voir en personne.
            </p>
		</div>
		<div id="divinter"></div>
		<div class="col accueildiv" id="div2">
			<h2>Boutique du BDE</h2>
			<p class="accueiltext">Notre site comporte également une boutique. Portez les couleurs de l'école ou achetez
                des goodies, tout ça à prix abordables. Payez en main propre ou attendez l'implémentation du service de paiement
                en ligne de paypal et recevez les articles commandés rapidement. Produits de qualité garantis.</p>
			<img src="images/BEL.png" alt="Logo boutique en ligne">
		</div>
	</div>
</div>




<!--div class="row justify-content-center mt-3 mb-3">
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
</div-->
</div>
@endsection
