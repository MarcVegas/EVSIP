<div class="ui basic segment">
<div class="ui large secondary inverted menu">
    <a href="/home" class="item">
    <img src="/storage/interface/logotext.png" class="ui tiny image">
    </a>
    <a class="item" href="/home">Browse</a>
    <a class="item" href="{{route('forum.index')}}">Community</a>
    <a class="item">Catalogue</a>
    <a class="item" href="/matcher">Matcher</a>
    <div class="right item">
        @guest
                <a class="ui inverted button" href="{{ route('login') }}">{{ __('Login') }}</a>
            @if (Route::has('register'))
                <a class="ui inverted violet button" href="{{ route('register') }}">{{ __('Register') }}</a>
            @endif
        @else
            <div class="ui inline dropdown">
                <div class="text">
                    <img class="ui avatar image" src="/storage/avatars/{{Auth::user()->avatar}}">
                    {{ Auth::user()->username }}
                </div>
                <i class="dropdown icon"></i>
                <div class="menu">
                    @if (Auth::user()->role == 'siteadmin')
                        <a class="item" href="/dashboard/siteadmin">
                        <i class="tachometer alternate icon"></i>
                        Dashboard
                        </a>
                    @elseif (Auth::user()->role == 'admin')
                        <a class="item" href="/dashboard/admin">
                        <i class="tachometer alternate icon"></i>
                        Dashboard
                        </a>
                    @elseif (Auth::user()->role == 'student')
                        <a class="item" href="/dashboard/student">
                        <i class="tachometer alternate icon"></i>
                        Dashboard
                        </a>
                    @endif
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
        @endguest
    </div>
</div>
</div>