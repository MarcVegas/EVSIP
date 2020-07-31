<div class="ui secondary menu" style="margin: 0px 0px !important;">
    <div class="right menu">
        @if (Auth::user()->role === 'admin' && \App\School::where('school_id', Auth::user()->user_id)->first()->membership == 'free')
            <button class="ui inverted orange premium button"><i class="chess queen icon"></i> Go Premium</button>
        @elseif(Auth::user()->role === 'siteadmin') 
            
        @else 
            <div class="item">
                <div class="ui green button"><i class="chess queen icon"></i> Premium Account</div>
            </div>
        @endif
        <div class="item">
            <span>
                <div class="ui inline dropdown">
                    <div class="text">
                        <img class="ui avatar image" src="/storage/avatars/{{Auth::user()->avatar}}" id="sideAvatar">
                        {{ Auth::user()->username }}
                    </div>
                    <i class="dropdown icon"></i>
                    <div class="menu">
                        <a class="item" href="/home">
                            <i class="home icon"></i>
                            Home
                        </a>
                        <a class="item" href="{{route('forum.index')}}">
                            <i class="newspaper outline icon"></i>
                            Forum
                        </a>
                        <a class="item" href="{{ route('logout') }}" onclick="event.preventDefault();
                        document.getElementById('logout-form').submit();">
                        <i class="sign-out icon"></i>
                        {{ __('Logout') }}
                        </a>
                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                            @csrf
                        </form>
                    </div>
                </div>
            </span>
        </div>
    </div>
</div>