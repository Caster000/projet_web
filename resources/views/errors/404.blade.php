@extends('layouts.master')

@section('title', 'Erreur 404')

@section('ajoutHead')
    <meta name="csrf-token" content="{{ csrf_token() }}">
@endsection

@section('content')

<div class="row">
    <div class="col-lg-12 text-center">
        <img src="http://www.reussiteeducativeestrie.ca/tiens_bon/wp-content/uploads/2019/03/tiens_toi_FR.png">
    </div>
    <div class="col-lg-12 text-center text-bold">
        Erreur 404...
    <br>
        <span>Mais ce n'est pas si grave. Fais demi-tour cher visiteur et tu trouveras ton chemin !</span>
    </div>
</div>
@endsection
