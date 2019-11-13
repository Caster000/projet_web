@extends('layouts.master')
@section('title','Boutique')
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
                        <img class="card-img-top" src="{{$article->urlImage}}">
                        <div class="card-block">
                            <h4 class="card-title">{{$article->nom}}, {{$article->prix}}€</h4>
                            <div class="card-text">
                                {{$article->description}}
                            </div>
                        </div>
                        <div class="card-footer">
                            <a href="{{ URL::action('BoutiqueController@article',  $article->id_produit) }}"
                               class="btn btn-info btn-sm"
                               href="{{route('article', ['numero'=>$article->id_produit])}}">Voir plus</a>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>

    <hr>

    <div class="container flex-center">
        <div class="btn-group pr-5">
            <div class="col-12 col-sm-4 col-lg-4 ">
                <button type="button" class="btn btn-black dropdown-toggle" data-toggle="dropdown" aria-haspopup="true"
                        aria-expanded="false">
                    Trier vos articles par prix
                </button>
                <div class="dropdown-menu dropdown-menu-right">
                    <span><a class="dropdown-item" href="{{route('accueil')}}">Par prix croissant</a></span>
                    <span><a class="dropdown-item" href="{{route('accueil')}}">Par prix décroissant</a></span>
                </div>
            </div>

            <div class="col-12 col-sm-6 col-lg-4">
                <button type="button" class="btn btn-black dropdown-toggle" data-toggle="dropdown" aria-haspopup="true"
                        aria-expanded="false">
                    Trier vos articles par catégories
                </button>
                <div class="dropdown-menu dropdown-menu-right">
                    @foreach($allCategories as $categorie)
                    <button class="dropdown-item" type="button">{{$categorie->categorie}}</button>
                    @endforeach
                </div>
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
    <div class="row flex-center">
        @foreach($allArticles as $article)
            <div class="col-sm-6 col-md-4 col-lg-3 mt-2 mb-4 ">
                <div class="card card-inverse card-info ">
                    <img class="card-img-top" src="{{$article->urlImage}}">
                    <div class="card-block">
                        <h4 class="card-title">{{$article->nom}}, {{$article->prix}}€</h4>
                        <div class="card-text">
                            {{$article->description}}

                        </div>
                    </div>
                    <div class="card-footer text-center">
                        <a href="{{ URL::action('BoutiqueController@article',  $article->id_produit) }}"
                           class="btn btn-info btn-sm" href="{{route('article', ['numero'=>$article->id_produit])}}">Voir
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
