<div class="ui tiny linkpost modal">
    <i class="close icon"></i>
    <div class="header">Select a forum post to link</div>
    <div class="scrolling content">
        @if ($posts ?? '')
            <div class="ui tertiary segment">
                <div class="ui form">
                    <div class="grouped fields">

                    </div>
                    @foreach ($posts as $post)
                        <div class="field">
                            <div class="ui radio checkbox">
                                <input type="radio" name="post" id="post" tabindex="0" class="hidden">
                                <label>{{$post->title}}</label>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        @else
            <div class="ui basic center aligned segment">
                <img class="ui centered small image" src="/storage/interface/box.png" alt="">
                <h4>You currently have no posts published in the forums. Click the button below to create a forum post.</h4>
                <a class="ui inverted blue button" href="/forum/create">Create Post</a>
            </div>
        @endif
    </div>
    <div class="actions">
        <button class="ui blue button">Select</button>
    </div>
</div>