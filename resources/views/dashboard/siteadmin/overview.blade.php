@extends('layouts.dashboard')

@section('content')
@include('inc.sidemenu')
<div class="thirteen wide column" style="padding: 0 !important;">
    @include('inc.navbar-admin')
    <div class="pale" style="margin-top: 1em; min-height: 41em;">
        <div class="ui basic segment">
            <h3>Quick Stats</h3>
            <div class="ui stackable grid">
                <div class="three column row">
                    <div class="column">
                        <div class="ui raised segment">
                            <img class="ui tiny left floated image" src="/storage/interface/graph.png" alt="">
                            <h2>1,000</h2>
                            <p>Visits today</p>
                        </div>
                    </div>
                    <div class="column">
                        <div class="ui raised segment">
                            <img class="ui tiny left floated image" src="/storage/interface/university.png" alt="">
                            <h2>{{$school}}</h2>
                            <p>Schools</p>
                        </div>
                    </div>
                    <div class="column">
                        <div class="ui raised segment">
                            <img class="ui tiny left floated image" src="/storage/interface/report.png" alt="">
                            <h2>{{$registered}}</h2>
                            <p>Registrations</p>
                        </div>
                    </div>
                </div>
                <div class="row">
                    
                </div>
            </div>
        </div>
    </div>
</div>
@endsection