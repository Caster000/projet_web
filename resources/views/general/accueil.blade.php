
@extends('layouts.master')

@section('title', 'Accueil')

@section('ajoutHead')
<meta name="csrf-token" content="{{ csrf_token() }}">
@endsection

@section('content')

<div id="tout">

<div class="container-fluid aaa">
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
            <a class="nav-link" href={{route('boutique')}}><img src="images/BEL.png" alt="Logo boutique en ligne" class="responsiveImage"></a>
		</div>
	</div>
</div>


</div>
@endsection
