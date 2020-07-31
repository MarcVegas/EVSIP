@extends('layouts.dashboard')

@section('content')
@include('inc.sidemenu')
<div class="thirteen wide column" style="padding: 0 !important;">
    @include('inc.navbar-admin')
    <div class="pale" style="margin-top: 1em; height: 41em;">
        @include('inc.messages')
        <div class="ui basic segment">
            <div class="ui secondary menu">
                <div class="ui left icon input">
                    <input type="text" placeholder="Search...">
                    <i class="search icon"></i>
                </div>
                <div class="right menu">
                    <a class="ui blue button" href="{{route('departments.create')}}"><i class="plus icon"></i> Add Department</a>
                </div>
            </div>
        </div>
        <div class="ui basic segment">
            @if (count($departments) > 0)
                <table class="ui selectable celled small table">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Username</th>
                            <th>Email</th>
                            <th>Department</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($departments as $department)
                            <tr>
                                <td>{{$department->user_id}}</td>
                                <td>{{$department->username}}</td>
                                <td>{{$department->email}}</td>
                                <td>{{$department->department}}</td>
                                <td>
                                    <div class="ui blue buttons">
                                        <a class="ui view button" href="">View</a>
                                        <div class="ui floating tasks dropdown icon button">
                                            <i class="dropdown icon"></i>
                                            <div class="menu">
                                                <a class="item edit" href="/dashboard/admin/departments/{{$department->user_id}}/edit"><i class="edit outline icon"></i> Edit</a>
                                                <a class="item deny"><i class="delete icon"></i> Remove</a>
                                            </div>
                                        </div>
                                    </div>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            @else 
                <div class="ui basic center aligned segment">
                    <br><br>
                    <img src="/storage/interface/department.png" class="ui centered small image" alt="no courses">
                    <h4>No departments added yet</h4>
                    <h5>Departments help manage registrations and messages related to them</h5>
                    <p>Press the <strong>Add Department</strong> button to start adding departments</p>
                </div>
            @endif
        </div>
    </div>
</div>
@endsection