@extends('layouts.forum')

@section('content')
<h2 style="color:white"><i class="pencil alternate icon"></i> Create Post</h2>
<div class="ui basic padded segment">
    <div class="ui raised inverted segment">
        <a href="">
            <img src="/storage/avatars/{{$user->avatar}}" class="ui avatar image" alt="">
        </a>
        <a class="ui small header">{{$user->username}}</a>
        @if ($user->role == 'siteadmin')
            <a class="ui blue tiny label">
                <i class="shield alternate icon"></i>
                {{$user->role}}
            </a>
        @elseif ($user->role == 'admin')
            <a class="ui brown tiny label">
                <i class="university icon"></i>
                {{$user->role}}
            </a>
        @elseif ($user->role == 'subadmin')
            <a class="ui teal tiny label">
                {{$user->role}}
            </a>
        @endif
        <div class="ui basic segment">
            <form class="ui inverted form" action="{{route('forum.store')}}" method="POST">
                @csrf

                <div class="field required">
                    <label>Title or Topic</label>
                    <input type="text" name="title" id="title" required autofocus>
                </div>
                <div class="inline fields">
                    <label>Tag</label>
                    <div class="field">
                        <div class="ui radio checkbox">
                            <input type="button" class="ui inverted brown button" name="tag" id="tag" value="Announcement" tabindex="0">
                        </div>
                    </div>
                    <div class="field">
                        <div class="ui radio checkbox">
                            <input type="button" class="ui inverted secondary button" name="tag" id="tag" value="Discussion" tabindex="0">
                        </div>
                    </div>
                    @if (Auth::user()->role == 'siteadmin')
                        <div class="field">
                            <div class="ui radio checkbox">
                                <input type="button" class="ui inverted green button" name="tag" id="tag" value="Featured" tabindex="0">
                            </div>
                        </div>
                    @endif
                </div>
                <div class="field required">
                    <label>Body</label>
                    <textarea name="body" id="post-body"></textarea>
                </div>
                <div class="actions">
                    <a href="{{route('forum.index')}}" class="ui circular button"><i class="angle left icon"></i> Cancel</a>
                    <button type="submit" class="ui circular right floated blue button">Post now</button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection