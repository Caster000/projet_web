@extends('layouts.master')
@section('ajoutHead')
    <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
    @endsection
@section('title','Boutique')
@section('addScripts')
    <script src="/projet_web/resources/js/boutiqueFiltres.js"></script>
    <script>                                                    //script pour l'autocompletion
        $(document).ready(function() {
            $('#ChampsRecherche').keyup(function () {
                //console.log('heu');
                var query = $(this).val();
                console.log(query);
                if (query != '') {
                    var _token = $('input[name="_token"]').val();
                    $.ajax({
                        url: 'boutique/fetch',
                        method: "POST",
                        //dataType:'json',
                        data: {query: query, _token: _token},
                        success: function (response) {
                            //console.log(response)
                            $('#rechercheList').fadeIn();
                            $('#rechercheList').html(response);
                        },
                        error: function (xhr, status, error) {
                            console.log(error)
                        }
                    })
                }
            });
            $(document).on('click','li', function(){
                $('#ChampsRecherche').val($(this).text());
                $('#rechercheList').fadeOut();
            })
        });
    </script>
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
            @foreach($topArticles as $article)        {{--    boucle d'affichage des produits en top    --}}
                <div class="col-sm-6 col-md-4 col-lg-3 mt-2 mb-4 ">
                    <div class="card card-inverse card-info ">
                        <a href="{{ URL::action('BoutiqueController@article',  $article->id_produit) }}">
                            <img class="card-img-top" src="{{$article->urlImage}}" alt="{{$article->id_produit}}">
                        </a>
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

    <div class="row justify-content-center">            {{--boutons pour tries + recherche --}}

            <div class="col-3 ml-4 mr-5 ">
                <select id="trierPrix" class="btn btn-primary">
                    <option value="Aleatoire">Trier vos articles par prix</option>
                    <option value="Croissant">Trier par prix croissant</option>
                    <option value="Decroissant">Trier par prix décroissant</option>
                </select>
            </div>
            <div class="col-3 align-center mr-5">
                <select id="trierCategories" class="btn btn-primary">
                    <option value="Tous">Trier vos articles par catégorie</option>
                    @foreach($allCategories as $categorie)
                    <option value="{{$categorie->categorie}}">{{$categorie->categorie}}</option>
                    @endforeach
                </select>
            </div>
            <div class="col-3 ml-4 ">
                <div class="row">
                    <input id="ChampsRecherche" type="text" name="search" class="form-control col-6" placeholder="Recherche...">
                        <button id="Rechercher" type="submit" class="btn btn-secondary col-2 "><span
                            class="fa fa-search"></span></button>


                @csrf {{csrf_field()}}
                </div><div id="rechercheList" ></div>
            </div>


    </div>

    <div class="row flex-center">
        <div class="display-4 text-center text-danger p-md-3">
            Tous nos articles
        </div>
    </div>
    <div class="row flex-center" id="affichageArticles">
        @foreach($allArticles as $article)           {{-- affichage des articles de base --}}
            <div class="col-sm-6 col-md-4 col-lg-3 mt-2 mb-4 ">
                <div class="card card-inverse card-info ">
                    <a href="{{ URL::action('BoutiqueController@article',  $article->id_produit) }}">
                        <img class="card-img-top" src="{{$article->urlImage}}"  alt="{{$article->nom}}">
                    </a>
                    <div class="card-block">
                        <h4 class="card-title">{{$article->nom}}, {{$article->prix}}€</h4>
                        <div class="card-text">
                            {{$article->description}}

                        </div>
                    </div>
                    <div class="card-footer text-center">
                        <a href="{{ URL::action('BoutiqueController@article',  $article->id_produit) }}"           {{-- aller sur la page de l'article --}}
                           class="btn btn-info btn-sm">Voir
                            plus</a>
                        @if(auth()->check() && auth()->user()->id_role===\App\Role::where('role','BDE')->first()->id_role)
                            <a href="{{ URL::action('BoutiqueController@delete',  $article->id_produit) }}"           {{-- supprimer l'article --}}
                               class="btn btn-danger btn-sm">Supprimer</a>
                        @endif
                    </div>
                </div>
            </div>
        @endforeach
    </div>

    @if(auth()->check() && auth()->user()->id_role===\App\Role::where('role','BDE')->first()->id_role)           {{-- afficher l'admin panel pour le bde --}}

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
