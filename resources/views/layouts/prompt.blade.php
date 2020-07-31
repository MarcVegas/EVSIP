<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>{{ config('app.name', 'Laravel') }}</title>
    <link href="{{ asset('css/semantic.min.css')}}" rel="stylesheet">
    <link rel="icon" href="/storage/interface/favicon.png">
    <style>
    body, html {
        height: 100%;
    }
    .bg {
        /* The image used */
        background-image: url("/storage/interface/plainbg.jpg");

        /* Full height */
        height: 100%;

        /* Center and scale the image nicely */
        background-position: center;
        background-repeat: no-repeat;
        background-size: cover;
    }
    .basic.segment{
        width: 40em !important;
        margin: auto;
        
    }
    .icon {
        font-size: 8em !important;
        color: rgb(12, 194, 21);
    }
    .title {
        font-size: 6em;
    }
    .subtitle {
        font-size: 1.2em;
    }
    </style>
    <script src="{{ asset('js/jquery.min.js') }}"></script>
</head> 
<body>
    @yield('content')
<script src="{{ asset('js/semantic.min.js') }}"></script>
</body>
</html>