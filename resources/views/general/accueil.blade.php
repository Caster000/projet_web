@extends('layouts.master')

@section('title', 'Accueil')

@section('ajoutHead')
    <meta name="csrf-token" content="{{ csrf_token() }}">
@endsection

@section('content')

<div class="flex-center position-ref full-height">

    <div class="content">
        <div class="title m-b-md">
            Bienvenue !
        </div>
    </div>
</div>

@endsection
