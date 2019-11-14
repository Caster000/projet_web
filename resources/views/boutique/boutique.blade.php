@extends('layouts.master')
@section('title','Boutique')
@section('addScripts')
    <script src="/projet_web/resources/js/app.js"></script>
@endsection
@section('content')


    <div class="content">
        <div class="title mb-3">
            Boutique
        </div>

        <hr>
        <div class="row flex-center">
            <div class="display-4 text-center text-danger p-md-3">
                Le top 3 de nos articles
            </div>
        </div>
        <div class="row flex-center">
            @foreach($topArticles as $article)
                <div class="col-sm-6 col-md-4 col-lg-3 mt-2 mb-4 ">
                    <div class="card card-inverse card-info ">
                        <img class="card-img-top" src="{{$article->urlImage}}" alt="{{$article->id_produit}}">
                        <div class="card-block">
                            <h4 class="card-title">{{$article->nom}}, {{$article->prix}}€</h4>
                            <div class="card-text">
                                {{$article->description}}
                            </div>
                        </div>
                        <div class="card-footer">
                            <a href="{{ URL::action('BoutiqueController@article',  $article->id_produit) }}"
                               class="btn btn-info btn-sm">Voir plus</a>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>

    <hr>

    <div class="container flex-center">
        <div class="btn-group pr-5">
            <div class="col-12 col-sm-6 col-lg-4">
                <select id="trierPrix" class="btn btn-primary">
                    <option value="Aleatoire">Trier vos articles par prix</option>
                    <option value="Croissant">Trier par prix croissant</option>
                    <option value="Decroissant">Trier par prix décroissant</option>
                </select>
            </div>
            <div class="col-12 col-sm-6 col-lg-4">
                <select id="trierCategories" class="btn btn-primary">
                    <option value="Tous">Trier vos articles par catégorie</option>
                    @foreach($allCategories as $categorie)
                    <option value="{{$categorie->categorie}}">{{$categorie->categorie}}</option>
                    @endforeach
                </select>
            </div>
            <div class="col-12 col-sm-8 col-lg-4 pr-5 pl-5">
                <form action="search" method="get" class="form-inline">
                    <div class="input-group">
                        <input type="text" name="search" class="form-control" placeholder="Recherche">
                        <span class="input-group-btn">
                            <button type="submit" class="btn btn-secondary"><span
                                    class="fa fa-search"></span> Valider</button>
                        </span>
                    </div>
                </form>
            </div>

        </div>
    </div>

    <div class="row flex-center">
        <div class="display-4 text-center text-danger p-md-3">
            Tous nos articles
        </div>
    </div>
    <div class="row flex-center" id="affichageArticles">
        @foreach($allArticles as $article)
            <div class="col-sm-6 col-md-4 col-lg-3 mt-2 mb-4 ">
                <div class="card card-inverse card-info ">
                    <img class="card-img-top" src="{{$article->urlImage}}"  alt="{{$article->nom}}">
                    <div class="card-block">
                        <h4 class="card-title">{{$article->nom}}, {{$article->prix}}€</h4>
                        <div class="card-text">
                            {{$article->description}}

                        </div>
                    </div>
                    <div class="card-footer text-center">
                        <a href="{{ URL::action('BoutiqueController@article',  $article->id_produit) }}"
                           class="btn btn-info btn-sm">Voir
                            plus</a>
                        @if(auth()->check() && auth()->user()->id_role===\App\Role::where('role','BDE')->first()->id_role)
                            <a href="{{ URL::action('BoutiqueController@delete',  $article->id_produit) }}"
                               class="btn btn-danger btn-sm">Supprimer</a>
                        @endif
                    </div>
                </div>
            </div>
        @endforeach
    </div>

    @if(auth()->check() && auth()->user()->id_role===\App\Role::where('role','BDE')->first()->id_role)

        @include('boutique.admin_panel')
{{--        <div class="col-12 col-sm-4 col-lg-4 ">--}}
{{--            <a href="{{route('updateArticles')}}">--}}
{{--                <button type="button" class="btn btn-primary">--}}
{{--                    Modifier un article--}}
{{--                </button>--}}
{{--            </a>--}}
{{--        </div>--}}

    @endif
@endsection
