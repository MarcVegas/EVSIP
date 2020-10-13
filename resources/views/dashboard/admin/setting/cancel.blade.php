@extends('layouts.dashboard')

@section('content')
@include('inc.sidemenu')
<div class="thirteen wide column" style="padding: 0 !important;">
    @include('inc.navbar-admin')
    <div class="pale" style="margin-top: 1em; height: 41em;">
        @include('inc.messages')
        <br><br>
        <div class="ui basic segment">
        <div class="ui stackable grid">
            <div class="eleven wide column">
                <div class="ui segments">
                    <div class="ui inverted teal segment">
                        <h2>We're sad to see you go</h2>
                    </div>
                    <div class="ui segment">
                        <h3>Jump back in anytime by activating your subscription</h3>
                        <br><br>
                        <a class="ui button" href="/dashboard/admin/profile/{{Auth::user()->user_id}}" href=""><i class="angle left icon"></i> Back</a>
                        <a class="ui cancelplan right floated button" href="">Activate Subscription</a>
                    </div>
                </div>
            </div>
            <div class="five wide column">
            </div>
        </div>
        </div>
    </div>
</div>
@endsection
@section('ajax')
    <script>
        $(document).ready(function () {
            var userid = "{{ Auth::user()->user_id }}";

            $('.cancelplan.modal').modal('attach events', '.cancelplan.button', 'show');
        });
    </script>
@endsection