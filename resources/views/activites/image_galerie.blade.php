@extends('layouts.galerie')
@section('content')
<div  class="row mt-1 ">
    <div class="col-7 ">
        <img src="/projet_web/public/{{$galerie->urlImage}}" class="img-fluid photo" alt="{{$galerie->titre}}">
        @if($like->isEmpty())
             <a href="{{-- {{ URL::action('LikeController@Like',  $activite->id_activite) }}--}}"  aria-pressed="false" class="btn btn-info m-3"><span class="fa fa-heart-o fa-lg"></span> </a>
        @else
            <a href=" {{--{{ URL::action('LikeController@Like',  $activite->id_activite) }}--}}"  aria-pressed="false" class="btn btn-info m-3"><span class="fa fa-heart fa-lg"></span> </a>
        @endif
            {{$countLike}}
    </div>

    <div class="col-5">
        <div class="row justify-content-center mt-2">
            @foreach($comment as $com)
            <div class="card w-75 mb-3">
                <div class="card-body">
                    <h5 class="card-title">{{$com->nom}}&nbsp{{$com->prenom}}</h5>
                    <p class="card-text">{{$com->commentaire}}</p>

                </div>
            </div>
            @endforeach
        </div>
    </div>

</div>

@endsection
