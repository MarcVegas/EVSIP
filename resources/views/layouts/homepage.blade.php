<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <link rel="stylesheet" type="text/css" href="{{ asset('css/semantic.min.css') }}">
        <link rel="stylesheet" type="text/css" href="{{ asset('slick-1.8.1/slick/slick.css')}}">
        <link rel="stylesheet" type="text/css" href="{{ asset('slick-1.8.1/slick/slick-theme.css')}}">
        <link rel="stylesheet" type="text/css" href="{{ asset('css/home.css') }}">
        <link href="https://fonts.googleapis.com/css2?family=Poppins&display=swap" rel="stylesheet">
        <link rel="icon" href="/storage/interface/favicon.png">
        <title>{{config('app.name', 'EVSIP')}}</title>
        <script src="{{asset('js/jquery.min.js')}}"></script>
    </head>
    <body>
    @yield('content')
    @include('inc.footer')
    <script src="{{ asset('js/semantic.min.js') }}"></script>
    <script type="text/javascript" src="//cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.min.js"></script>
    <script src="{{asset('js/master-semantic.min.js')}}"></script>
    <script>
        $(document).ready(function () {
            $('.jumbotron').slick({
                dots: true,
                infinite: true,
                autoplay: true,
                centerMode: true,
                centerPadding: '20px',
            });
        });
    </script>
    </body>
</html>