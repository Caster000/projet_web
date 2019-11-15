@extends('layouts.galerie')

@section('styleParticulier')
    <link rel="stylesheet" type="text/css" href="/projet_web/public/css/image_galerie.css"/>
@endsection

@section('content')
<div  class="row mt-1 ">
    <div class="col-7 ">
        {{--  Affichage de la photo + like  --}}
        <img src="/projet_web/public/{{$galerie->urlImage}}" class="img-fluid photo" alt="{{$galerie->titre}}">
        @if((\App\Liker::where('id_photo', $galerie->id_photo)->where('id_personne', auth()->user()->id_personne)->first()) == null)
            <a href=" {{ route('like',  [$galerie->id_activite, $galerie->id_photo,auth()->user()->id_personne]) }}"  aria-pressed="false" class="btn btn-info m-3"><span class="fa fa-heart-o fa-lg"></span> </a>
        @else
            <a href=" {{ URL::action('PhotoController@deleteLike',  [$galerie->id_activite,$galerie->id_photo,auth()->user()->id_personne]) }}"  aria-pressed="false" class="btn btn-info m-3"><span class="fa fa-heart fa-lg"></span> </a>
        @endif
            {{$countLike}}
    </div>

    <div class="col-5">
        <div class="row justify-content-center mt-2">
            @foreach($comment as $com)                  {{--  Affichages des commentaires   --}}
            @if(!(auth()->user()->id_role===\App\Role::where('role','Etudiant')->first()->id_role))
            <div class="card w-75 mb-3">
                <div class="row">
                        <div class="card-header col-11">
                            <div class="card-body">
                                <h5 class="card-title">{{$com->nom}}&nbsp{{$com->prenom}}</h5>
                                <p class="card-text">{{$com->commentaire}}</p>
                            </div>
                        </div>
                            <!--Visible au BDE et au personnel CESI-->
                    @if(auth()->user()->id_role===\App\Role::where('role','BDE')->first()->id_role || auth()->user()->id_role===\App\Role::where('role','CESI')->first()->id_role)
                        <div class="card-header col-1">
                            @if(!($com->visible===1))
                                <a href="{{route('commentaireRendreVisible', [$com->id_commentaire])}}" class="col-lg-1 rounded-0 pl-0 blue-hover"><span class="fa fa-eye-slash fa-lg"></span></a>
                            @else
                                <a href="{{route('commentaireRendreInvisible', [$com->id_commentaire])}}" class="col-lg-1 rounded-0 pl-0 blue-hover"><span class="fa fa-eye fa-lg"></span></a>
                            @endif
                            @if(auth()->user()->id_role===\App\Role::where('role','BDE')->first()->id_role)
                                <a href="{{route('deleteCommentaire', [$com->id_commentaire])}}" class="col-lg-1 rounded-0 pl-0 red-hover"><span class="fa fa-trash fa-lg"></span></a>
                            @endif
                        </div>
                    @endif
                </div>
            </div>
            @elseif($com->visible == 1)                 {{--  visibilite des commentaires  --}}
                <div class="card w-75 mb-3">
                    <div class="row">
                        <div class="card-header col-12">
                            <div class="card-body">
                                <h5 class="card-title">{{$com->nom}}&nbsp{{$com->prenom}}</h5>
                                <p class="card-text">{{$com->commentaire}}</p>
                            </div>
                        </div>
                        <!--Visible au BDE et au personnel CESI-->
                        @if(auth()->user()->id_role===\App\Role::where('role','BDE')->first()->id_role || auth()->user()->id_role===\App\Role::where('role','CESI')->first()->id_role)
                            <div class="card-header col-1">
                                @if(!($com->visible===1))
                                    <a href="{{route('commentaireRendreVisible', [$com->id_photo, $com->id_personne])}}" class="col-lg-1 rounded-0 pl-0 blue-hover"><span class="fa fa-eye-slash fa-lg"></span></a>
                                @else
                                    <a href="{{route('commentaireRendreInvisible', [$com->id_photo, $com->id_personne])}}" class="col-lg-1 rounded-0 pl-0 blue-hover"><span class="fa fa-eye fa-lg"></span></a>
                                @endif
                                @if(auth()->user()->id_role===\App\Role::where('role','BDE')->first()->id_role)
                                    <a href="{{route('deleteCommentaire', [$com->id_photo, $com->id_personne])}}" class="col-lg-1 rounded-0 pl-0 red-hover"><span class="fa fa-trash fa-lg"></span></a>
                                @endif
                            </div>
                        @endif
                    </div>
                </div>
            @endif
            @endforeach
                <div class="row justify-content-center">                 {{--  modal pour ajouter un commentaire  --}}
                    <button type="button" class="btn btn-info m-2 " data-toggle="modal" data-target="#exampleModal" data-whatever="@ajouterCommentaire"><span class="fa fa-pencil fa-lg"></span>&nbspCommenter... </button>
                </div>
                <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel">Nouveau commentaire</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body mr-5 ml-5">
                                <form action="{{ URL::action('PhotoController@addCommentaire',  [$galerie->id_activite, $galerie->id_photo,auth()->user()->id_personne]) }}" method="post" enctype="multipart/form-data">
                                @csrf <!-- {{ csrf_field() }} -->
                                    <div class="form">
                                        <div class="form-group row">
                                            <textarea class="form-control" placeholder="Commentaire..." name="commentaire" required></textarea>
                                        </div>
                                        <div class="modal-footer col mt-4">
                                            <button type="submit" class="btn btn-primary">Ajouter</button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
        </div>
    </div>

</div>

@endsection
