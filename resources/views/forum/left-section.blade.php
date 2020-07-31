<div class="ui basic segment" style="font-weight:bolder;">
    <img class="ui image" src="/storage/interface/forums.png" alt="">
    <div class="ui large middle aligned selection inverted list">
        <a class="item" href="{{route('forum.index')}}">
            <i class="home icon" style="padding-right:1.5em"></i>
                Home
        </a>
        <a class="item">
            <i class="compass outline icon" style="padding-right:1.5em"></i> 
                Explore
        </a>
        <a class="item">
            <i class="fire icon" style="padding-right:1.5em"></i> 
                Hot
        </a>
        <a class="item" href="{{route('bookmark.index')}}">
            <i class="bookmark outline icon" style="padding-right:1.5em"></i> 
                Bookmarks
        </a>
        <a class="item" href="{{route('forum.posts')}}">
            <i class="inbox icon" style="padding-right:1.5em"></i> 
                Posts
        </a>
    </div>
    @if (\Request::route()->getName() != "forum.create")
        <div class="ui basic center aligned segment">
            <a href="{{route('forum.create')}}" class="ui circular blue fluid button">Create Post</a>    
        </div>
    @endif
    {{-- <div class="ui center aligned padded segment">
        <i class="info circle big icon"></i>
        <h5>Before posting please read our rules and guidelines on posting</h5>
        <br>
        <a href=""><i class="external link icon"></i> Rules and Guidelines</a>
    </div> --}}
</div>