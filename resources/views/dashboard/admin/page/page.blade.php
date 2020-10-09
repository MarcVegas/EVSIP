@extends('layouts.dashboard')

@section('content')
@include('inc.sidemenu')
<div class="thirteen wide column" style="padding: 0 !important;">
    @include('inc.navbar-admin')
    <div class="pale" style="margin-top: 1em; height: 41em;">
        @include('inc.messages')
        <div class="ui basic segment">
            <div class="ui secondary menu">
                <a href="#" class="active item" data-tab="first">Announcements</a>
                <a href="#" class="item" data-tab="second">Mission/Vision</a>
                <a href="#" class="item" data-tab="third">Gallery</a>
                <div class="right menu">
                    <div class="item">
                        <a class="ui inverted purple button" target="_blank" rel="noopener noreferrer" href="/page/{{Auth::user()->user_id}}"><i class="external alternate icon"></i> Visit Page</a>
                    </div>
                </div>
            </div>
            <div class="ui stackable grid">
                <div class="eleven wide column">
                    <div class="ui basic segment">
                        <div class="ui basic active tab segment" data-tab="first">
                            <a class="ui right floated button" href="{{route('announcement.create')}}"><i class="plus icon"></i> Create</a><br><br>
                            @if ($announcements ?? '')
                                <table class="ui single line small table">
                                    <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>Title</th>
                                            <th>Posted on</th>
                                            <th>Actions</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($announcements as $announcement)
                                            <tr>
                                                <td>{{$announcement->id}}</td>
                                                <td>{{$announcement->title}}</td>
                                                <td>{{$announcement->created_at}}</td>
                                                <td class="center aligned">
                                                    <div class="ui blue buttons">
                                                        <a class="ui view button" href="#"><i class="edit outline icon"></i> Edit</a>
                                                        <div class="ui floating tasks dropdown icon button">
                                                            <i class="dropdown icon"></i>
                                                            <div class="menu">
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
                                    <img src="/storage/interface/box.png" class="ui centered small image" alt="no announcements">
                                    <h4>No announcements made yet</h4>
                                    <p>To make an announcement click the <strong>create</strong> button</p>
                                </div>
                            @endif
                        </div>
                        <div class="ui basic tab segment" data-tab="second">
                            <form class="ui form" action="{{route('schoolpage.store')}}" method="POST">
                                @csrf
                                <div class="field">
                                    <label>Mission</label>
                                    <textarea name="mission" id="mission" rows="6">
                                        @if ($page ?? '')
                                            {{$page->mission}}
                                        @endif
                                    </textarea>
                                </div>
                                <div class="field">
                                    <label>Vision</label>
                                    <textarea name="vision" id="vision" rows="6">
                                        @if ($page ?? '')
                                            {{$page->vision}}
                                        @endif
                                    </textarea>
                                </div>
                                <input type="hidden" name="_method" value="POST">
                                <button class="ui right floated green button" type="submit">Save</button>
                            </form><br><br>
                        </div>
                        <div class="ui basic tab segment" data-tab="third">
                            <a class="ui right floated teal button" href="{{route('galleries.create')}}"><i class="plus icon"></i> Add Photos</a>
                            @if ($galleries ?? '')
                                <br><br><br>
                                <div class="ui special four doubling cards">
                                    @foreach ($galleries as $gallery)
                                        <div class="card">
                                            <div class="blurring dimmable image">
                                                <div class="ui inverted dimmer">
                                                    <div class="content">
                                                        <div class="center">
                                                            <form action="{!! action('GalleryController@destroy', $gallery->id) !!}" method="POST">
                                                                @csrf
                                                                <input type="hidden" name="_method" value="DELETE">
                                                                <button type="submit" class="ui inverted red icon labeled button"><i class="trash alternate outline icon"></i> Remove</button>
                                                            </form>
                                                        </div>
                                                    </div>
                                                </div>
                                                <img src="/storage/gallery/{{$gallery->image}}">
                                            </div>
                                        </div>
                                    @endforeach
                                </div>
                            @else
                                <div class="ui basic center aligned segment">
                                    <img src="/storage/interface/photo.png" class="ui centered small image" alt="no courses">
                                    <h4>No photos added yet</h4>
                                    <p>Click the <strong>Add Photos</strong> button to add photos to your gallery</p>
                                </div>
                            @endif
                        </div>
                    </div>
                </div>
                <div class="five wide column">
                    <div class="ui center aligned segment">
                        <p class="ui header">Enrollment Period</p>
                        @if ($page ?? '')
                            <div class="ui label">
                                <strong>Start:</strong> {{$page->enrollment_start}}
                            </div>
                            <div class="ui label">
                                <strong>End:</strong> {{$page->enrollment_end}}
                            </div><br><br>
                        @else 
                            <h4>No enrollment period set</h4>
                        @endif
                        
                        <button class="ui grey enroll button"><i class="calendar plus outline icon"></i> Set Enrollment Period</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@include('modal.modal-enrollment')
@endsection
@section('ajax')
    <script>
        $('.special.cards .image').dimmer({
            on: 'hover'
        });
    </script>
@endsection