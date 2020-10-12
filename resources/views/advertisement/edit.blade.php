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
                    <form action="{!! action('AdvertisementController@destroy', $advertisement->id) !!}" method="post">
                    <input type="hidden" name="_method" value="DELETE">
                    <button class="ui inverted red button" type="submit"><i class="trash icon"></i> Delete</button>
                    </form>
                </div>
                <div class="right menu">
                    <div class="item">
                        <button type="submit" form="ad-form" class="ui button"><i class="newspaper outline green icon"></i> Publish</button>
                    </div>
                </div>
            </div>
            <form class="ui form" action="{!! action('AdvertisementController@update', $advertisement->id) !!}" name="ad-form" id="ad-form" method="POST" enctype="multipart/form-data">
                @csrf
            <div class="ui stackable grid">
                <div class="eleven wide column">
                    <div class="field">
                        <label>Title</label>
                        <input type="text" name="title" id="title" value="{{$advertisement->title}}" required autofocus>
                    </div>
                    <div class="field">
                        <label>Body</label>
                        <textarea name="body" id="ckeditor-textarea">{!! $advertisement->body !!}</textarea>
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
                            <input type="number" name="discount" id="discount" value="{{$advertisement->discount}}" min="0" max="100">
                        </div>
                        <div class="field">
                            <label><i class="linkify blue icon"></i> Link to course or school (optional)</label>
                            <select class="ui search dropdown" name="link" id="link">
                                <option value="">Select link</option>
                                <option value="{{Auth::user()->user_id}}">{{ Auth::user()->username }}</option>
                                @if (count($courses) > 0)
                                    @foreach ($courses as $course)
                                        <option {{($course->course_id == $advertisement->link) ? 'selected' : ''}} value="{{$course->course_id}}">{{$course->course_name}}</option>
                                    @endforeach
                                @endif
                            </select>
                        </div>
                        <hr>
                        <div class="field">
                            <label><i class="image outline teal icon"></i> Select ad background (optional) </label>
                            <small>EVSIP provides default backgrounds if you do not upload a custom background</small>
                            {{-- <select class="ui search dropdown" name="background" id="background">
                                <option value="adbg1.png">Default</option>
                                @if (count($backgrounds) > 0)
                                    @foreach ($backgrounds as $background)
                                        <option value="{{$background->filename}}">{{$background->filename}}</option>
                                    @endforeach
                                @endif
                            </select>
                            <div class="ui horizontal divider">
                                or
                            </div> --}}
                            <input type="file" (change)="fileEvent($event)" form="course-form" class="inputfile" name="custombg" id="custombg"/>
                            <label for="fileimage" class="ui inverted primary button">
                                Upload image
                            </label>
                        </div>
                    </div>
                </div>
            </div>
            <input type="hidden" name="_method" value="PUT">
            </form>
            <p>Your ad will run from <strong>{{date('d M y, h:i a', strtotime(Carbon\Carbon::now()))}}</strong> to <strong>{{date('d M y, h:i a', strtotime(Carbon\Carbon::now()->addMonth()))}}</strong></p>
        </div>
    </div>
</div>
@include('modal.modal-premium')
@endsection

@push('ckeditor')
    <script>
        $(document).ready(function (){
            ClassicEditor.create( document.querySelector( '#ckeditor-textarea' ) )
            .then( editor => {
                console.log( editor );
            } )
            .catch( error => {
                console.error( error );
            } );
        });
    </script>
@endpush