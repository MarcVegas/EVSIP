@extends('layouts.app')

@section('content')
<div class="ui basic compressed segment">
    <div class="ui stackable padded grid">
        <div class="white row">
            <div class="column">
                <div class="ui basic very padded center aligned segment">
                    <img class="ui small centered image" src="/storage/interface/podium.png" alt="">
                    <h2>Congratulations! Your account has been upgraded to <strong>Premium</strong></h2>
                    <p>You can now use premium features in your dashboard menu. Thanks for your support</p>
                    <a class="ui blue button" href="/dashboard/admin">Go to Dashboard</a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection