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
    <link href="https://fonts.googleapis.com/css2?family=Poppins&display=swap" rel="stylesheet">
    <style>
        html {
            scroll-behavior: smooth;
        }
        body {
            background: #101a23;
            font-family: 'Poppins',sans-serif;
        }
        .sideimage {
            -webkit-filter: blur(1px); /* Safari 6.0 - 9.0 */
            filter: blur(1px);
            position: relative;
            max-width: 300px;
            min-height: 450px;
        }
        .logo {
            position: absolute;
            width: 10em;
            top: 40%;
            left: 50%;
            transform: translate(-50%, -50%);
        }
        .visit {
            position: absolute;
            bottom: 32px;
            left: 30%;
        }
        .description {
            font-family: 'Poppins',sans-serif;
        }
        select{
            background-color: RGB(16, 26, 35) !important;
            font-family: 'Poppins',sans-serif;
            color: white !important;
        }
        .pale {
            background: #f6f6f6 !important;
        }
        .inputfile {
            width: .1px;
            height: .1px;
            opacity: 0;
            overflow: hidden;
            position: absolute;
            z-index: -1
        }
        .ui.ui.transparent.inverted.input>input {
            color: inherit;
            outline: 0!important;
            padding-bottom: 4px!important;
            border-width: 0 0 2px!important;
            border-color: rgba(240, 114, 30, .5)!important;
        }
        .chatapp {
            position: fixed;
            bottom: 23px;
            right: 28px;
            z-index: 100;
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
    <script src="{{ asset('js/jquery.min.js') }}"></script>
</head> 
<body>
@include('inc.navbar')
@include('inc.messages')
@yield('content')
<script src="https://js.pusher.com/5.1/pusher.min.js"></script>
<script src="{{ asset('js/semantic.min.js') }}"></script>
<script src="{{ asset('js/master-semantic.min.js') }}"></script>
@stack('ajax')
@yield('js')
<script>
    $(document).ready(function () {
        function truncate() {
            var description = $('.description').text();
            if (description.length > 300)
                $('.description').text(description.substring(0,500) + '...');
        };
        truncate();

        $('#career').popup();
        $('#uploadedfiles').progress();
    });
</script>
</body>
</html>

