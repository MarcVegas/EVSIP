@extends('layouts.dashboard')

@section('content')
@include('inc.sidemenu')
<div class="thirteen wide column" style="padding: 0 !important;">
    @include('inc.navbar-admin')
    <div class="pale" style="margin-top: 1em; height: 42em;">
        @include('inc.messages')
        <br><br>
        <div class="ui basic segment">
            <div class="ui stackable grid">
                <div class="eleven wide column">
                    <div class="ui segment">
                        <div class="gradient-info card-icon long">
                            <h2 class="header center aligned" style="color: white;">Course info</h2>
                        </div><br><br>
                        <div class="ui equal width form">

                            <div class="fields">
                                <div class="field">
                                    <label>Course ID</label>
                                    <input type="text" value="{{$course->course_id}}" name="course_id" id="course_id" readonly>
                                </div>
                                <div class="field">
                                    <label>Acronym</label>
                                    <input type="text" value="{{$course->abbreviation}}" name="abbreviation" id="abbreviation" readonly>
                                </div>
                            </div>
                            <div class="fields">
                                <div class="field">
                                    <label>Course Name</label>
                                    <input type="text" value="{{$course->course_name}}" name="course_name" id="course_name" readonly>
                                </div>
                                <div class="field">
                                    <label>Tuition</label>
                                    <input type="text" value="{{$course->tuition}}" name="tuition" id="tuition" readonly>
                                </div>
                            </div>
                            <div class="fields">
                                <div class="field">
                                    <label>Category</label>
                                    <input type="text" value="{{$course->course_categ}}" name="course_categ" id="course_categ" readonly>
                                </div>
                                <div class="field">
                                    <label>Duration</label>
                                    <input type="text" value="{{$course->duration}}" name="duration" id="duration" readonly>
                                </div>
                            </div>
                            <div class="fields">
                                <div class="field">
                                    <label>Enrollment Status</label>
                                    <input type="text" value="{{$course->enrollment}}" name="enrollment" id="enrollment" readonly>
                                </div>
                                <div class="field">
                                    <label>Department</label>
                                    <input type="text" value="{{$course->department}}" name="department" id="department" readonly>
                                </div>
                            </div>
                            <div class="field">
                                <textarea id="course-description" rows="6" readonly>
                                    {{$course->description}}
                                </textarea>
                            </div>
                            <div class="ui secondary menu">
                                <div class="item">
                                    <a class="ui button" href="{{route('courses.index')}}">Back</a>
                                </div>
                                <div class="right menu">
                                    <div class="item">
                                        <a class="ui blue button" href="{{$course->course_id}}/edit"><i class="edit icon"></i>Edit</a>
                                    </div>
                                    <div class="item">
                                        <button class="ui red delete button"><i class="trash icon"></i> Delete</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="five wide column"></div>
            </div>
        </div>
    </div>
</div>
@endsection