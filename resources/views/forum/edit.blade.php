@extends('layouts.forum')

@section('content')
<h2><i class="edit icon"></i> Edit Post</h2>
<div class="ui basic padded segment">
    <div class="ui raised segment">
        <a href="">
            <img src="/storage/avatars/{{Auth::user()->avatar}}" class="ui avatar image" alt="">
        </a>
        <a class="ui small header">{{Auth::user()->username}}</a>
        @if (Auth::user()->role == 'siteadmin')
            <a class="ui blue tiny label">
                <i class="shield alternate icon"></i>
                {{Auth::user()->role}}
            </a>
        @elseif (Auth::user()->role == 'admin')
            <a class="ui brown tiny label">
                <i class="university icon"></i>
                {{Auth::user()->role}}
            </a>
        @elseif (Auth::user()->role == 'subadmin')
            <a class="ui teal tiny label">
                {{Auth::user()->role}}
            </a>
        @endif
        <div class="ui basic segment">
            <form class="ui form" action="{!! action('ForumController@update', $post->post_id) !!}" method="POST">
                @csrf

                <div class="field required">
                    <label>Title or Topic</label>
                    <input type="text" value="{{$post->title}}" name="title" id="title" required autofocus>
                </div>
                <div class="field required">
                    <label>Body</label>
                    <textarea name="body" id="post-body">
                        {!! $post->body !!}
                    </textarea>
                </div>
                <input type="hidden" name="_method" value="PUT">
                <div class="actions">
                    <a href="{{route('forum.index')}}" class="ui circular button"><i class="angle left icon"></i> Cancel</a>
                    <button type="submit" class="ui circular right floated blue button">Update</button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection