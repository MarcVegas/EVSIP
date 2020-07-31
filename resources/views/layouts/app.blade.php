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
    <link href="{{ asset('css/app.css')}}" rel="stylesheet">
    <link rel="icon" href="/storage/interface/favicon.png">
    <script src="{{ asset('js/jquery.min.js') }}"></script>
</head> 
<body>
    @yield('content')
<script src="{{ asset('js/semantic.min.js') }}"></script>
<script src="{{ asset('js/master-semantic.min.js') }}"></script>
<script>
    $('.register.modal').modal('attach events', '.register.button', 'show');
    $('.required.modal').modal('attach events', '.required.button', 'show');
</script>
</body>
</html>
