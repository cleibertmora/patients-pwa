<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Styles -->
    {{-- <link href="{{ asset('css/app.css') }}" rel="stylesheet"> --}}
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet"> 
    <!-- Compiled and minified CSS -->
     <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css">
 
    <style>
        #newPatient {
            position: fixed;
            bottom: 2rem;
            right: 2rem;
        }

        .pagination li a {
            color: #fff;
            display: inline-block;
            font-size: 1rem;
            padding: 0 1rem;
            line-height: 2.5;
        }
    </style>

</head>
<body class="blue-grey lighten-5">
    <div id="app">
        @include('layouts.parts.nav')

        @yield('content')
    </div>

    <!-- Scripts -->
    <!-- Compiled and minified JavaScript -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script>
    <script src="{{ asset('js/app.js') }}"></script>
    <script src="{{ asset('js/main.js') }}"></script>
</body>
</html>
