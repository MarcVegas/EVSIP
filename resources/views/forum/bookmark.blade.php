@extends('layouts.forum')

@section('content')
<div class="ui basic padded segment">
    @include('inc.messages')
    <h3 style="color:white">Saved</h3>
    @if (count($bookmarks) > 0)
        @foreach ($bookmarks as $bookmark)
            <div class="ui raised inverted segment">
                <a href="">
                    <img src="/storage/avatars/{{$bookmark->avatar}}" class="ui avatar image" alt="">
                </a>
                <a class="ui small header">{{$bookmark->username}}</a>
                @if ($bookmark->role == 'siteadmin')
                    <a class="ui blue tiny label">
                        <i class="shield alternate icon"></i>
                        {{$bookmark->role}}
                    </a>
                @elseif ($bookmark->role == 'admin')
                    <a class="ui brown tiny label">
                        <i class="university icon"></i>
                        {{$bookmark->role}}
                    </a>
                @elseif ($bookmark->role == 'subadmin')
                    <a class="ui teal tiny label">
                        {{$bookmark->role}}
                    </a>
                @endif
                    <div class="ui icon top left pointing right floated dropdown black button">
                        <i class="ellipsis vertical icon"></i>
                        <div class="menu">
                            <a class="item"><i class="bookmark icon"></i>Unsave</a>
                            <a class="item"><i class="flag icon"></i> Report</a>
                        </div>
                    </div>
                <h2 style="color: #2185d0;">{{$bookmark->title}}</h2>
                <small>Posted on: {{$bookmark->created_at}}</small>
                <div class="ui basic inverted segment">
                    {!! $bookmark->body !!}
                </div>
                <a href="">View this thread <i class="long arrow alternate right icon"></i></a>
                <br>
                <form class="ui inverted form" action="" method="post">
                    @csrf

                    <div class="inline fields">
                        <div class="two wide field" style="font-weight:bolder">
                            <div class="ui black circular icon button">
                                <i class="thumbs up outline icon"></i>
                            </div>
                        </div>
                        <div class="eleven wide field">
                            <div class="ui inverted transparent input">
                            <input placeholder="Type a comment..." type="text" name="comment" id="comment">
                            </div>
                        </div>
                        <button class="ui blue button">Comment</button>
                    </div>
                </form>
            </div>
        @endforeach
    @else 
        <div class="ui basic center aligned segment">
            <img class="ui small centered image" src="/storage/interface/box.png" alt="">
            <h3 style="color:white">No bookmarks added</h3>
        </div>
    @endif
</div>
@endsection