@extends('layouts.master')
<<<<<<< HEAD
@section('title','Accueil')
=======
@section('title', 'Accueil')

@section('ajoutHead')
    <meta name="csrf-token" content="{{ csrf_token() }}">
@endsection

>>>>>>> bruno_creation_routes
@section('content')

<div class="flex-center position-ref full-height">
    @if (Route::has('login'))
        <div class="top-right links">
            @auth
                <a href="{{ url('/home') }}">Home</a>
            @else
                <a href="{{ route('login') }}">Login</a>

                @if (Route::has('register'))
                    <a href="{{ route('register') }}">Register</a>
                @endif
            @endauth
        </div>
    @endif

    <div class="content">
        <div class="title m-b-md">
            Bienvenue !
        </div>
    </div>
</div>

@endsection
