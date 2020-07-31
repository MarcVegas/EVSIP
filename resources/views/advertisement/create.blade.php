@extends('layouts.dashboard')

@section('content')
@include('inc.sidemenu')
<div class="thirteen wide column" style="padding: 0 !important;">
    @include('inc.navbar-admin')
    <div class="pale" style="margin-top: 1em; min-height: 41em;">
        @include('inc.messages')
        <div class="ui basic segment">
            <div class="ui secondary menu">
                <div class="item">
                    <a href="" class="ui button"><i class="save outline purple icon"></i> Save as draft</a>
                </div>
                <div class="right menu">
                    <div class="item">
                        <button class="ui button"><i class="eye blue icon"></i> Preview</button>
                    </div>
                    <div class="item">
                        <button type="submit" form="ad-form" class="ui button"><i class="newspaper outline green icon"></i> Publish</button>
                    </div>
                </div>
            </div>
            <form class="ui form" action="{{route('advertisements.store')}}" name="ad-form" id="ad-form" method="POST" enctype="multipart/form-data">
                @csrf
            <div class="ui stackable grid">
                <div class="eleven wide column">
                        <div class="field">
                            <label>Title</label>
                            <input type="text" name="title" id="title" required autofocus>
                        </div>
                        <div class="field">
                            <label>Body</label>
                            <textarea name="body" id="ckeditor-textarea"></textarea>
                        </div>
                        <input type="hidden" name="_method" value="POST">
                </div>
                <div class="five wide column">
                    <br>
                    <div class="ui raised segment">
                        <h4 style="text-align: center;"><i class="cog grey icon"></i> Ad Setting</h4>
                        <hr>
                        <div class="field">
                            <label><i class="money bill alternate green icon"></i> Display percent discount (optional)</label>
                            <input type="number" name="discount" id="discount" min="0" max="100">
                        </div>
                        <div class="field">
                            <label><i class="linkify blue icon"></i> Link to course or school (optional)</label>
                            <select class="ui search dropdown" name="link" id="link">
                                <option value="">Select link</option>
                                <option value="{{Auth::user()->user_id}}">{{ Auth::user()->username }}</option>
                                @if (count($courses) > 0)
                                    @foreach ($courses as $course)
                                        <option value="{{$course->course_id}}">{{$course->course_name}}</option>
                                    @endforeach
                                @endif
                            </select>
                        </div>
                        <div class="field">
                            <label><i class="cloud download grey icon"></i> Add downloadable file (optional)</label>
                            <input type="file" (change)="fileEvent($event)" form="course-form" class="inputfile" name="file" id="file"/>
                            <label for="fileimage" class="ui inverted secondary button">
                                Upload File
                            </label>
                            <small>png,jpg,docx,pdf only</small>
                        </div>
                        <hr>
                        <div class="field">
                            <label><i class="image outline teal icon"></i> Select background</label>
                            <select class="ui search dropdown" name="background" id="background">
                                <option value="adbg1.png">Default</option>
                                @if (count($backgrounds) > 0)
                                    @foreach ($backgrounds as $background)
                                        <option value="{{$background->filename}}">{{$background->filename}}</option>
                                    @endforeach
                                @endif
                            </select>
                            <div class="ui horizontal divider">
                                or
                            </div>
                            <input type="file" (change)="fileEvent($event)" form="course-form" class="inputfile" name="custombg" id="custombg"/>
                            <label for="fileimage" class="ui inverted primary button">
                                Upload image
                            </label>
                        </div>
                    </div>
                </div>
            </div>
            </form>
            <p>Your ad will run from <strong>{{date('d M y, h:i a', strtotime(Carbon\Carbon::now()))}}</strong> to <strong>{{date('d M y, h:i a', strtotime(Carbon\Carbon::now()->addMonth()))}}</strong></p>
        </div>
    </div>
</div>
@include('modal.modal-premium')
@endsection