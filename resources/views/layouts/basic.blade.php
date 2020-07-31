<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'EVSIP') }}</title>
    <!-- Fonts -->

    <!-- Styles -->
    <link href="{{ asset('css/semantic.min.css')}}" rel="stylesheet">
    <link rel="icon" href="/storage/interface/favicon.png">
    <script src="{{ asset('js/jquery.min.js') }}"></script>
</head> 
<body>
<div class="ui basic inverted blue padded segment">
    <a class="ui secondary button" href="/login"><i class="angle left icon"></i> Go back</a>
</div>
<div class="ui grid">
    <div class="three wide column"></div>
    <div class="ten wide column">
        <div class="ui basic very padded segment">
            @yield('content')
        </div>
    </div>
    <div class="three wide column"></div>
</div>
<script src="{{ asset('js/semantic.min.js') }}"></script>
<script src="{{ asset('js/master-semantic.min.js') }}"></script>
</body>
</html>

