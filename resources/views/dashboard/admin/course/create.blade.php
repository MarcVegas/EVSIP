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
                            <h2 class="header center aligned" style="color: white;">Create course</h2>
                        </div><br><br>
                        <form class="ui equal width form" action="{{route('courses.store')}}" method="POST" id="course-form" enctype="multipart/form-data">
                            @csrf

                            <div class="fields">
                                <div class="field">
                                    <label>Course ID</label>
                                    <input type="text" name="course_id" id="course_id">
                                </div>
                                <div class="field">
                                    <label>Acronym</label>
                                    <input type="text" name="abbreviation" id="abbreviation">
                                </div>
                            </div>
                            <div class="fields">
                                <div class="field">
                                    <label>Course Name</label>
                                    <input type="text" name="course_name" id="course_name">
                                </div>
                                <div class="field">
                                    <label>Tuition</label>
                                    <input type="text" name="tuition" id="tuition">
                                </div>
                            </div>
                            <div class="fields">
                                <div class="field">
                                    <label>Category</label>
                                    <select class="ui dropdown" name="course_categ" id="course_categ">
                                        <option value="">Select Category</option>
                                        @foreach (Cache::get('course_categ') as $category)
                                            <option value="{{ $category }}">{{ $category }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="field">
                                    <label>Duration</label>
                                    <select class="ui dropdown" name="duration" id="duration">
                                        <option value="">Select Duration</option>
                                        @foreach (Cache::get('duration') as $duration)
                                            <option value="{{ $duration }}">{{ $duration }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="field">
                                    <label>Enrollment Status</label>
                                    <select class="ui dropdown" name="enrollment" id="enrollment">
                                        <option value="">Select Status</option>
                                        @foreach (Cache::get('enrollment') as $enrollment)
                                        <option value="{{ $enrollment }}">{{ $enrollment }}</option>
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
                                                <option value="{{$dep->username}}">{{$dep->username}}</option>
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
                                <textarea name="description" id="ckeditor-textarea" rows="6"></textarea>
                            </div>
                            <div class="ui secondary stackable menu">
                                <div class="item">
                                    <a class="ui red button" href="{{route('courses.index')}}">Cancel</a>
                                </div>
                                <div class="right item">
                                    <button type="submit" class="ui green button"><i class="check icon"></i>Submit</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
                <div class="five wide column">
                    <div class="ui placeholder segment">
                        <div class="ui icon tiny header">
                            <i class="pdf file outline icon"></i>
                            Upload course prospectus <br>
                            (pdf, jpg, png, jpeg)
                        </div>
                        <input type="file" (change)="fileEvent($event)" form="course-form" class="inputfile" name="prospectus" id="fileimage"/>
                        <label for="fileimage" class="ui primary button">
                            Upload File
                        </label>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@include('modal.modal-premium')
@endsection