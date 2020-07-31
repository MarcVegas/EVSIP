<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <link rel="stylesheet" type="text/css" href="{{ asset('css/semantic.min.css') }}">
        <style>
            body {
                background-color: #101a23 !important;
            }


        </style>
        <link rel="icon" href="/storage/interface/favicon.png">
        <title>{{config('app.name', 'EVSIP')}}</title>
        <script src="{{asset('js/jquery.min.js')}}"></script>
    </head>
    <body>
    @include('inc.navbar')
    <div class="ui stackable grid">
        <div class="column"></div>
        <div class="three wide column">
            @include('forum.left-section')
        </div>
        <div class="eight wide column">
            @yield('content')
        </div>
        <div class="three wide column">
            @include('forum.right-section')
        </div>
        <div class="column"></div>
    </div>
    <script src="{{ asset('js/semantic.min.js') }}"></script>
    <script src="{{asset('js/master-semantic.min.js')}}"></script>
    <script src="{{ asset('ckeditor/ckeditor.js') }}"></script>
    <script>
        ClassicEditor
        .create( document.querySelector( '#post-body' ) )
        .then( editor => {
            console.log( editor );
        } )
        .catch( error => {
            console.error( error );
        } );
    </script>
    </body>
</html>