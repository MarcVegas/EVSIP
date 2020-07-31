<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" type="text/css" href="{{ asset('css/semantic.min.css') }}">
        <link rel="stylesheet" type="text/css" href="{{ asset('css/admin.min.css') }}">
        <link rel="stylesheet" type="text/css" href="{{ asset('css/gradientcolors.css') }}">
        <link rel="icon" href="/storage/interface/favicon.png">

        <meta name="csrf-token" content="{{ csrf_token() }}">
        
        <style>
            .pale {
                    background-color: #fcf7f8 !important;
                }
            .active.side {
                background-color: #384fe3 !important;
            }
            h1,h2,h3,h4,h5 {
                font-family: 'Mollen Personal Use',sans-serif;
            }
            .card-icon {
                width: 6em;
                height: 6em;
                border-radius: 6px;
                margin-top: -4em;
                left: 1.5em;
                position: absolute;
                box-shadow: 0 4px 20px 0px rgba(0, 0, 0, 0.14), 0 7px 10px -5px rgba(0, 188, 212, 0.4);
                z-index: 100;
            }
            .inputfile {
                width: 0.1px;
                height: 0.1px;
                opacity: 0;
                overflow: hidden;
                position: absolute;
                z-index: -1;
            }
            #map {
                width: 34.6em;
                height: 31.2em;
            }
        </style>
        <title>{{config('app.name', 'EVSIP')}}</title>
        
    </head>
    <body>
    <div class="ui stackable padded grid">
        <div class="row">
            @yield('content')
        </div>
    </div>
    <script src="https://js.pusher.com/5.1/pusher.min.js"></script>
    <script src="{{asset('js/jquery.min.js')}}"></script>
    <script src="{{ asset('js/semantic.min.js') }}"></script>
    <script src="{{ asset('js/master-semantic.min.js') }}"></script>
    <script src="{{ asset('ckeditor/ckeditor.js') }}"></script>
    @yield('ajax')
    <script>
        ClassicEditor
        .create( document.querySelector( '#ckeditor-textarea' ) )
        .then( editor => {
            console.log( editor );
        } )
        .catch( error => {
            console.error( error );
        } );

        $('.premium.modal').modal('attach events', '.premium.button', 'show');
        $('.basic.modal').modal('attach events', '.approve.button', 'show');
        $('.period.modal').modal('attach events', '.enroll.button', 'show');
        $('.linkpost.modal').modal('attach events', '.forum.button', 'show');
    </script>
    </body>
</html>