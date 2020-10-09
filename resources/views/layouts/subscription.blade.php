<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'EVSIP') }}</title>
    <!-- Fonts -->

    <!-- Styles -->
    <link href="{{ asset('css/semantic.min.css')}}" rel="stylesheet">
    <link href="{{ asset('css/app.css')}}" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Poppins&display=swap" rel="stylesheet">
    <link rel="icon" href="/storage/interface/favicon.png">
    <style>
        body {
            background: #101a23;
        }
        h1,h2,h3,h4,h5,h6,p {
            font-family: 'Poppins', sans-serif !important;
        }
    </style>
    <script src="{{ asset('js/jquery.min.js') }}"></script>
</head> 
<body>
<script src="https://www.paypal.com/sdk/js?client-id=AT-m_GlMpyp7nPVKHXxNhL_lSXAOK_3ZBtdioq_E2iA0Myvp7kKVAvz1wIfXUmqvow4o0GydtwDb3gBr&vault=true"></script>
    @yield('content')
<script src="{{ asset('js/semantic.min.js') }}"></script>
<script src="{{ asset('js/master-semantic.min.js') }}"></script>
<script>
    var user_id = "{{Auth::user()->user_id}}";

    paypal.Buttons({
    createSubscription: function(data, actions) {

    return actions.subscription.create({

        'plan_id': '{{$plan_id}}'

    });

    },

    onApprove: function(data, actions) {

    console.log('You have successfully created subscription ' + data.subscriptionID);
    updateMembership();
    window.location.href = '/subscribe/success';

    }

    }).render('#paypal-button-container');

    

    function updateMembership() {
        $.ajax({
            type: "GET",
            url: '/subscribe/membership/' + user_id,
            data: "",
            cache: false,
            success: function (data) {
                console.log('success');
            },
            error: function(data) {
                console.log(data);
            }
        });
    }

    $('.ui.radio.checkbox').checkbox();
    $('.banktransfer.modal').modal('attach events', '.bank');
    $('.radio.bank').click(function () {
        $('.confirmsub').removeClass('disabled');
    });
</script>
</body>
</html>