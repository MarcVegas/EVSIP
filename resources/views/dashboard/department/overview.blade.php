@extends('layouts.dashboard')

@section('content')
@include('inc.sidemenu')
<div class="thirteen wide column" style="padding: 0 !important;">
    @include('inc.navbar-admin')
    <div class="pale" style="margin-top: 1em; height: 41em;">
        <div class="ui basic segment">
            <h3>Quick Stats</h3>
            <div class="ui stackable grid">
                <div class="three column row">
                    <div class="column">
                        <div class="ui raised segment">
                            <img class="ui tiny left floated image" src="/storage/interface/report.png" alt="">
                            <h2>{{$courses}}</h2>
                            <p>Courses</p>
                        </div>
                    </div>
                    <div class="column">
                        <div class="ui raised segment">
                            <img class="ui tiny left floated image" src="/storage/interface/graph2.png" alt="">
                            <h2>{{count($registrations)}}</h2>
                            <p>Registrations</p>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="ten wide column">
                        <h3 style="float: left">Latest Registrations</h3>
                        <a class="ui inverted violet right floated mini button" href="{{route('registrations.index')}}">See registrations</a><br>
                        @if ($registrations ?? '')
                            <table class="ui very basic selectable celled table">
                                <thead>
                                    <tr>
                                        <th>Student</th>
                                        <th>Type</th>
                                        <th>Status</th>
                                        <th>Course</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($registrations as $registration)
                                        <tr>
                                            <td>
                                                <h4 class="ui image header">
                                                    <img src="/storage/avatars/maleuser.png" class="ui mini rounded image">
                                                    <div class="content">
                                                    {{$registration->username}}
                                                    <div class="sub header">{{$registration->created_at}}
                                                    </div>
                                                </div>
                                                </h4>
                                            </td>
                                            <td>{{$registration->type}}</td>
                                            <td>{{$registration->status}}</td>
                                            <td>{{$registration->course_id}}</td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>   
                        @else 
                            <div class="ui basic center aligned segment">
                                <br><br>
                                <img src="/storage/interface/student2.png" class="ui centered small image" alt="no courses">
                                <h4>No students have registered yet</h4>
                                <p>Want to attract more students? Go <strong>Premium</strong> and start an Ad Campaign for free*</p>
                            </div>
                        @endif
                    </div>
                    <div class="six wide column">
                        <h3>Your Top 5 courses</h3>
                    </div>
                </div>
            </div>
        </div>
        {{-- <div class="ui basic center aligned segment">
            <br><br>
            <img src="/storage/interface/laptop.png" class="ui centered small image" alt="no reports">
            <h4>No reports can be generated yet</h4>
            <p>This is common for new accounts. Once more data can be collected statistics will appear</p>
        </div> --}}
    </div>
</div>
@include('modal.modal-premium')
@endsection