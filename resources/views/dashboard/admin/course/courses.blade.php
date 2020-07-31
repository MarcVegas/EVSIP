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
                    <a class="ui blue button" href="{{route('courses.create')}}"><i class="plus icon"></i> Add Course</a>
                </div>
            </div>
        </div>
        <div class="ui basic segment">
            @if (count($courses) > 0)
                <table class="ui selectable celled small table">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Title</th>
                            <th>Category</th>
                            <th>Duration</th>
                            <th>Tuition</th>
                            <th>Enrollment</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($courses as $course)
                            <tr>
                                <td>{{$course->course_id}}</td>
                                <td>{{$course->course_name}}</td>
                                <td>{{$course->course_categ}}</td>
                                <td>{{$course->duration}}</td>
                                <td>{{$course->tuition}}</td>
                                <td>{{$course->enrollment}}</td>
                                <td>
                                    <div class="ui blue buttons">
                                        <a class="ui view button" href="/dashboard/admin/courses/{{$course->course_id}}">View</a>
                                        <div class="ui floating tasks dropdown icon button">
                                            <i class="dropdown icon"></i>
                                            <div class="menu">
                                                <a class="item edit" href="/dashboard/admin/courses/{{$course->course_id}}/edit"><i class="edit outline icon"></i> Edit</a>
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
                    <img src="/storage/interface/knowledge.png" class="ui centered small image" alt="no courses">
                    <h4>No courses added yet</h4>
                    <p>Press the <strong>Add Course</strong> button to start adding courses</p>
                </div>
            @endif
        </div>
    </div>
</div>
@include('modal.modal-premium')
@endsection