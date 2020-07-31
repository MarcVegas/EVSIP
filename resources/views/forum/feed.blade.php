@extends('layouts.forum')

@section('content')
<div class="ui basic padded segment">
    @include('inc.messages')
    @if (count($posts) > 0)
        @foreach ($posts as $post)
            <div class="ui raised inverted segment">
                <a href="">
                    <img src="/storage/avatars/{{$post->avatar}}" class="ui avatar image" alt="">
                </a>
                <a class="ui small header">{{$post->username}}</a>
                @if ($post->role == 'siteadmin')
                    <a class="ui blue tiny label">
                        <i class="shield alternate icon"></i>
                        {{$post->role}}
                    </a>
                @elseif ($post->role == 'admin')
                    <a class="ui brown tiny label">
                        <i class="university icon"></i>
                        {{$post->role}}
                    </a>
                @elseif ($post->role == 'subadmin')
                    <a class="ui teal tiny label">
                        {{$post->role}}
                    </a>
                @endif
                    <div class="ui icon top left pointing right floated dropdown black button">
                        <i class="ellipsis vertical icon"></i>
                        <div class="menu">
                            @if (Auth::user()->user_id == $post->user_id)
                                <a class="item" href="/forum/{{$post->post_id}}/edit"><i class="edit icon"></i> Edit</a>
                                <a class="item"><i class="trash alternate icon"></i> Delete</a>
                            @else 
                                <a class="item"><i class="bookmark icon"></i> Save</a>
                                <a class="item"><i class="flag icon"></i> Report</a>
                            @endif
                        </div>
                    </div>
                <h2 style="color: #2185d0;">{{$post->title}}</h2>
                <small>Posted on: {{date('d M y, h:i a', strtotime($post->created_at))}}</small>
                <div class="ui basic inverted segment">
                    {!! $post->body !!}
                </div>
                <a href="/forum/{{$post->post_id}}">View this thread <i class="long arrow alternate right icon"></i></a>
                <br>
                <form class="ui inverted form" action="{!! action('ForumController@comment', Auth::user()->user_id) !!}" method="POST">
                    @csrf

                    <div class="inline fields">
                        <div class="two wide field" style="font-weight:bolder">
                            <div class="ui black circular icon button">
                                <i class="thumbs up outline icon"></i>
                            </div>
                        </div>
                        <div class="eleven wide field">
                            <div class="ui inverted transparent input">
                            <input placeholder="Type a comment..." type="text" name="comment" id="comment" style="color:white">
                            </div>
                        </div>
                        <input type="hidden" name="_method" value="POST">
                        <input type="hidden" name="thread_id" id="thread_id" value="{{$post->thread_id}}">
                        <button type="submit" class="ui blue button">Comment</button>
                    </div>
                </form>
            </div>
        @endforeach
    @else 
        <div class="ui basic center aligned segment">
            <br><br>
            <img src="/storage/interface/post.png" class="ui centered small image" alt="no posts">
            <h4>No posts yet</h4>
            <p>Be the first to create a post by clicking <strong>Create Post</strong></p>
        </div>
    @endif
</div>
@endsection