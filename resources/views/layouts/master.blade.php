<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>@yield ('title')</title>

    <!--  ================  Ajout à Head  =================  -->
    @yield('ajoutHead')

    <!-- Styles -->
    @include('layouts.cesi_graphique')
    <style>

    </style>
</head>
<body>

<!--  ================  NavBar  =================  -->

@include('layouts.navbar')

<!--  ================  Content  =================  -->

@yield('content')

<!--  ================  Footer  =================  -->

@include('layouts.footer')

<!--  ================  Scripts  =================  -->
@include('layouts.scripts_communs')
@yield('addScripts')

</body>

</html>

