@extends('layouts.dashboard')

@section('content')
@include('inc.sidemenu')
<div class="thirteen wide column" style="padding: 0 !important;">
    @include('inc.navbar-admin')
    <div class="pale" style="margin-top: 1em; height: 41em;">
        @include('inc.messages')
        <div class="ui basic segment">
            <div class="ui secondary menu">
                <div class="item">
                    <a href="/pagemanagement" class="ui button" ><i class="angle left icon"></i> Back</a>
                </div>
                <div class="right menu">
                    <div class="item">
                        <a class="ui inverted purple button" target="_blank" rel="noopener noreferrer" href="/page/{{Auth::user()->user_id}}"><i class="external alternate icon"></i> Visit Page</a>
                    </div>
                </div>
            </div>
            <form class="ui form" action="{{route('announcement.store')}}" method="POST">
                @csrf
            <div class="ui stackable grid">
                <div class="eleven wide column">
                    <div class="ui basic segment">
                        <h2><i class="pencil alternate icon"></i> Create Announcement</h2>
                            <div class="field required">
                                <label>Title or Topic</label>
                                <input type="text" name="title" id="title" required autofocus>
                            </div>
                            <div class="field required">
                                <label>Short Description</label>
                                <textarea name="body" rows="3"></textarea>
                            </div>
                            <input type="hidden" name="role" id="role" value="{{Auth::user()->role}}">
                            <input type="hidden" name="user_id" id="user_id" value="{{Auth::user()->user_id}}">
                            <input type="hidden" name="_method" value="POST">
                            <div class="actions">
                                <button type="submit" class="ui circular right floated blue button">Post now</button>
                            </div>
                    </div>
                </div>
                <div class="five wide column">
                    <br><br>
                    <div class="ui raised segment">
                        <h4 style="text-align: center;"><i class="cog grey icon"></i> Setting</h4>
                        <hr>
                        <div class="field">
                            <label><i class="linkify blue icon"></i> Link to forum post (optional)</label>
                            <select class="ui search dropdown" name="linked" id="linked">
                                <option value="">Select post</option>
                                @if ($posts ?? '')
                                    @foreach ($posts as $post)
                                        <option value="{{$post->post_id}}">{{$post->title}}</option>
                                    @endforeach
                                @endif
                            </select>
                        </div>
                        <small>This will add a button that will link your announcement to a published forum post</small>
                    </div> 
                </div>
            </div>
            </form>
        </div>
    </div>
</div>
@include('modal.modal-linkpost')
@endsection