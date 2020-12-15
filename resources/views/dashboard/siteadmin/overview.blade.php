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
                            <h2>15</h2>
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
                    <div class="sixteen wide column">
                        <div class="ui basic segment">
                            <h3>Recent approved applicants</h3>
                            @if ($schools ?? '')
                                <table class="ui selectable celled small table">
                                    <thead>
                                        <tr>
                                            <th>School Name</th>
                                            <th>Category</th>
                                            <th>Type</th>
                                            <th>Affiliation</th>
                                            <th>Contact</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($schools as $school)
                                            <tr>
                                                <td>{{$school->school_name}}</td>
                                                <td>{{$school->category}}</td>
                                                <td>{{$school->type}}</td>
                                                <td>{{$school->affiliation}}</td>
                                                <td>{{$school->contact}}</td>
                                            </tr>
                                        @endforeach
                                        
                                    </tbody>
                                </table>
                            @else
                                <div class="ui basic center aligned segment">
                                    <br><br>
                                    <img src="/storage/interface/university.png" class="ui centered small image" alt="no registrants">
                                    <h4>No schools available</h4>
                                </div>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection