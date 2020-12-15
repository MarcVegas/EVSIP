@extends('layouts.dashboard')

@section('content')
@include('inc.sidemenu')
<div class="thirteen wide column" style="padding: 0 !important;">
    @include('inc.navbar-admin')
    <div class="pale" style="margin-top: 1em; min-height: 42em;">
        @include('inc.messages')
        <br><br>
        <div class="ui basic segment">
            <div class="ui stackable grid">
                <div class="eleven wide column">
                    <div class="ui segment">
                        <div class="gradient-info card-icon long">
                            <h2 class="header center aligned" style="color: white;">Update course</h2>
                        </div><br><br>
                        <form class="ui equal width form" action="{!! action('CoursesController@update', $course->course_id) !!}" method="POST">
                            @csrf

                            <div class="fields">
                                <div class="field">
                                    <label>Course ID</label>
                                    <input type="text" value="{{$course->course_id}}" name="course_id" id="course_id" required>
                                </div>
                                <div class="field">
                                    <label>Acronym</label>
                                    <input type="text" value="{{$course->abbreviation}}" name="abbreviation" id="abbreviation">
                                </div>
                            </div>
                            <div class="fields">
                                <div class="field">
                                    <label>Course Name</label>
                                    <input type="text" value="{{$course->course_name}}" name="course_name" id="course_name">
                                </div>
                                <div class="field">
                                    <label>Tuition</label>
                                    <input type="text" value="{{$course->tuition}}" name="tuition" id="tuition">
                                </div>
                            </div>
                            <div class="fields">
                                <div class="field">
                                    <label>Category</label>
                                    <select class="ui dropdown" name="course_categ" id="course_categ">
                                        <option value="">Select Category</option>
                                        @foreach (Cache::get('course_categ') as $category)
                                            <option value="{{ $category }}"{{ ( $course->course_categ == $category ) ? ' selected' : '' }}>{{ $category }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="field">
                                    <label>Duration</label>
                                    <select class="ui dropdown" name="duration" id="duration">
                                        <option value="">Select Duration</option>
                                        @foreach (Cache::get('duration') as $duration)
                                        <option value="{{ $duration }}"{{ ( $course->duration == $duration ) ? ' selected' : '' }}>{{ $duration }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="field">
                                    <label>Enrollment Status</label>
                                    <select class="ui dropdown" name="enrollment" id="enrollment">
                                        <option value="">Select Status</option>
                                        @foreach (Cache::get('enrollment') as $enrollment)
                                        <option value="{{ $enrollment }}"{{ ( $course->enrollment == $enrollment ) ? ' selected' : '' }}>{{ $enrollment }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="fields">
                                <div class="field">
                                    <label>Majors (optional)</label>
                                    <select class="ui search dropdown" name="majors" id="majors" multiple>
                                        <option value="">Select Status</option>
                                        @foreach (Cache::get('majors') as $majors)
                                        <option value="{{ $majors }}">{{ $majors }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="field">
                                    <label>Department</label>
                                    <select class="ui dropdown" name="department" id="department">
                                        <option value="">Select Department</option>
                                        @if (count($deps) > 0)
                                            @foreach ($deps as $dep)
                                                <option {{ ( $course->department == $dep->user_id ) ? ' selected' : '' }} value="{{ $dep->user_id }}"{{ ( $course->department == $dep->username ) ? ' selected' : '' }}>{{ $dep->username }}</option>
                                            @endforeach
                                        @else 
                                            <option value="0" class="ui error message" disabled>You must add department accounts first!
                                                Add departments in Account Setting > Departments
                                            </option>
                                        @endif
                                    </select>
                                </div>
                            </div>
                            <div class="field">
                                <textarea name="description" id="ckeditor-textarea" rows="6">
                                    @if (!empty($course->description))
                                        {{$course->description}}
                                    @endif
                                </textarea>
                            </div>
                            <input type="hidden" name="id" value="{{$course->id}}">
                            <input type="hidden" name="_method" value="PUT">
                            <div class="ui secondary stackable menu">
                                <div class="item">
                                    <a class="ui button" href="{{route('courses.index')}}"><i class="angle left icon"></i> Go back</a>
                                </div>
                                <div class="right item">
                                    <button type="submit" class="ui green button"><i class="check icon"></i>Submit</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
                <div class="five wide column"></div>
            </div>
        </div>
    </div>
</div>
@endsection