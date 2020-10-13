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
    <link rel="icon" href="/storage/interface/favicon.png">
    <style>
        body {
            background: #101a23;
        }
        .dark {
            background: #2d2d2d !important;
        }
        .part-title {
            font-family: 'Poppins', sans-serif !important;
            color: orange !important;
        }
        .part-subtitle {
            font-family: 'Poppins', sans-serif;
            color: white;
            text-align: center;
        }
        .link.card {
            background: #8a73ff !important;
        }
        .subject {
            font-family: 'Poppins', sans-serif;
            font-weight: bold;
            text-align: center;
            font-size: 1.2em;
            color: white;
        }
        .match-tab {
            padding:1em 10em 1em 10em!important
        }
        .pricing {
            min-height:34.3em !important;
        }
        .card.image {
            position: relative !important;
        }
        .floatdesc {
            position: absolute;
            bottom: 0;
            padding: .5em;
            font-family: 'Trebuchet MS', sans-serif;
            font-weight: bolder;
            color: white
        }

        .floatlabel {
            position: absolute;
            top: 8px;
            margin-left: .5em!important
        }

        .ui.raised.link.view.card {
            min-height: 300px!important;
            background: url(/storage/interface/card.jpg);
            border-radius: 0px !important;
        }
    </style>
    <script src="{{ asset('js/jquery.min.js') }}"></script>
</head> 
<body>
    @yield('content')
<script src="{{ asset('js/semantic.min.js') }}"></script>
<script src="{{ asset('js/master-semantic.min.js') }}"></script>
<script>
    $(document).ready(function () {
        var type;

        $('.first.button').on('click', function() {
            $.tab('change tab', 'second');
            type = $(this).attr('id');
        });

        $('.second.button').on('click', function() {
            $.tab('change tab', 'third');
            getMatch()
        });

        $('.link.card').click(function (){
            var code = $(this).attr("data-id");
            if ($('#'+code).hasClass("hidden")) {
            $('#'+code).removeClass('hidden');
            }else{
                $('#'+code).addClass('hidden');
            }
        });

        function getMatch() {
            $.ajax({
                type: "GET",
                url: '/matcher/getmatch/' + type,
                data: "",
                cache: false,
                success: function (data) {
                    $('#match-results').html(data);
                },
                error: function(jqXHR, status, err) {
                    console.log("some shit happened");
                }
            });
        }
    });
</script>
</body>
</html>