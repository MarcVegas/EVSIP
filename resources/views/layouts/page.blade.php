<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" type="text/css" href="{{ asset('css/semantic.min.css') }}">
        <link rel="stylesheet" type="text/css" href="{{ asset('slick-1.8.1/slick/slick.css')}}">
        <link rel="stylesheet" type="text/css" href="{{ asset('slick-1.8.1/slick/slick-theme.css')}}">
        <link rel="stylesheet" type="text/css" href="{{ asset('css/home.css') }}">
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <link href="https://fonts.googleapis.com/css2?family=Poppins&display=swap" rel="stylesheet">
        <style>
            body{
                font-family: 'Poppins', sans-serif;
            }
            .landing {
                background: url('/storage/interface/adbg1.png') !important;
                background-repeat: no-repeat;
            }
            .chatapp {
                position: fixed;
                bottom: 23px;
                right: 28px;
                z-index: 100;
            }
            .flashcard {
                border-radius: 15px;
                background-color: rgba(56, 47, 47, 0.116);
            }
            .popup {
                position: fixed !important;
            }
            ul {
                list-style: none;
                margin: 0;
                padding: 0;
            }
            ul li {
                display: inline-block;
                clear: both;
                padding: 10px;
                border-radius: 30px;
                margin-bottom: 2px;
                font-family: "Mollen Personal Use", Arial, sans-serif;
            }
            .sender {
                background: #eee;
                float: left;
            }
            .receiver {
                float: right;
                background: #0084ff;
                color: #fff;
            }
            .sender + .receiver {
                border-bottom-right-radius: 5px;
            }
            .receiver + .receiver {
                border-top-right-radius: 5px;
                border-bottom-right-radius: 5px;
            }
            .receiver:last-of-type {
                border-bottom-right-radius: 30px;
            }
        </style>
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
    @stack('ajax')
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