@extends('layouts.master')

@section('content')

    <div class="mt-5 mr-5 ml-5">
        <a href="{{ URL::action('ActivitesController@activiteNumero',  $activite->id_activite) }}"
           class="btn btn-success mb-5">Retour sur l'activité</a>
    </div>
    <div class="row justify-content-center">
        @foreach($gallerie as $photo)
            <div class="card col-lg-6 col-sm-4  mb-3 mr-4 ml-4 photo ">
{{--                {{dd($activite)}}--}}
                <a href="{{ URL::action('PhotoController@image',  [$activite->id_activite,$photo->titre]) }}" data-lity><img
                        src="/projet_web/public/{{$photo->urlImage}}" class="card-img-top " alt="{{$photo->titre}}">

                </a>

{{--                <div id="{{$photo->titre}}" style="background:#fff" class="lity-hide 1">--}}
{{--                        <div>{{$photo->titre}}jj</div>--}}
{{--                        <img src="/projet_web/public/{{$photo->urlImage}}" class="card-img-top " alt="{{$photo->titre}}">--}}
{{--                </div>--}}

{{--                <div id="comment-box-sep">--}}
{{--                    <a href="/projet_web/public/{{$photo->urlImage}}" data-sub-html='<div>{{$photo->titre}}"</div>'>--}}
{{--                        <img src="/projet_web/public/{{$photo->urlImage}}" class="card-img-top " alt="{{$photo->titre}}">--}}
{{--                    </a>--}}

{{--                </div>--}}
                {{--                    <a href="#myModal<a href="https://www.jqueryscript.net/tags.php?/Modal/">Modal</a>" data-lity>Launch</a>--}}

                {{--                    <div id="myModal" class="lity-hide">--}}
                {{--                        Modal content here--}}
                {{--                    </div>--}}
{{--                <div class="lity" role="dialog" aria-label="Dialog Window (Press escape to close)" tabindex="-1">--}}
{{--                    <div class="lity-wrap" data-lity-close role="document">--}}
{{--                        <div class="lity-loader" aria-hidden="true">Loading...</div>--}}
{{--                        <div class="lity-container">--}}
{{--                            <div class="lity-content"></div>--}}
{{--                            <button class="lity-close" type="button" aria-label="Close (Press escape to close)"--}}
{{--                                    data-lity-close>&times;--}}
{{--                            </button>--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                </div>--}}

            </div>

        @endforeach
    </div>


@endsection
@section('addScripts')
    <script >
    </script>
@endsection
