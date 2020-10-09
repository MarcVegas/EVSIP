@extends('layouts.dashboard')

@section('content')
@include('inc.sidemenu')
<div class="thirteen wide column" style="padding: 0 !important;">
    @include('inc.navbar-admin')
    <div class="pale" style="margin-top: 1em; height: 41em;">
        <div class="ui basic padded segment">
            <h3>Quick Stats</h3>
            <div class="ui stackable grid">
                <div class="three column row">
                    <div class="column">
                        <div class="ui raised segment">
                            <img class="ui tiny left floated image" src="/storage/interface/wishlist.png" alt="">
                            <h2>{{$favs}}</h2>
                            <p>Favorites</p>
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
            </div>
            <h3>Recent Registrations</h3>
            @if ($registrations ?? '')
                <table class="ui very basic selectable celled table">
                    <thead>
                        <tr>
                            <th>Course</th>
                            <th>Category</th>
                            <th>Duration</th>
                            <th>Tuition</th>
                            <th>Status</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($registrations as $registration)
                            <tr>
                                <td>{{$registration->course_name}}</td>
                                <td>{{$registration->course_categ}}</td>
                                <td>{{$registration->duration}}</td>
                                <td>{{$registration->tuition}}</td>
                                <td>
                                    @if ($registration->status == 'approved')
                                        <label class="ui green label">{{$registration->status}}</label>
                                    @else 
                                        <label class="ui blue label">{{$registration->status}}</label>
                                    @endif
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            @else
                <div class="ui basic center aligned segment">
                    <br><br>
                    <img src="/storage/interface/laptop.png" class="ui centered small image" alt="no reports">
                    <h4>No reports can be generated yet</h4>
                    <p>This is common for new accounts. Once more data can be collected statistics will appear</p>
                </div>
            @endif
        </div>
    </div>
</div>
@endsection