<div class="three wide black column">
    <div class="ui basic segment">
        <div class="ui visible inverted left vertical borderless menu">
            <div class="ui basic segment">
                <img src="/storage/interface/logotext.png" alt="" width="80%">
            </div>
            @if (Auth::user()->role === 'siteadmin')
            <a class="item" href="/dashboard/siteadmin">
                <div class="ui inline">
                    <i class="chart bar outline icon large"></i>
                    Dashboard
                </div>
            </a>
            <a class="item" href="/dashboard/siteadmin/profile/{{Auth::user()->user_id}}">
                <div class="ui inline">
                    <i class="user outline icon large"></i>
                    Account Setting
                </div>
            </a>
            <a class="item" href="/dashboard/siteadmin/registrations">
                <div class="ui inline">
                    <i class="users icon large large"></i>
                    Registration
                </div>
            </a>
            <div class="ui left pointing dropdown link item">
                <span><i class="paypal large icon"></i> Subscription</span>
                <div class="menu">
                    <a class="item" href="{{route('list.product')}}">Overview</a>
                    <a class="item" href="{{route('list.plan')}}">Plan Management</a>
                    <a class="item" href="{{route('list.subscription')}}">Subscriber Management</a>
                </div>
                <i class="dropdown icon"></i>
            </div>
            @elseif (Auth::user()->role === 'admin')
            <a class="item" href="/dashboard/{{Auth::user()->role}}">
                <div class="ui inline">
                    <i class="chart bar outline icon large"></i>
                    Dashboard
                </div>
            </a>
            <div class="ui left pointing dropdown link item">
                <i class="dropdown icon"></i>
                <span><i class="user outline icon large"></i> Account Setting</span>
                <div class="menu">
                    <a class="item" href="/dashboard/admin/profile/{{Auth::user()->user_id}}">Profile</a>
                    <a class="item" href="{{route('departments.index')}}">Departments</a>
                </div>
            </div>
            <a class="item" href="{{route('courses.index')}}">
                <div class="ui inline">
                    <i class="book icon large large"></i>
                    Courses
                </div>
            </a>
            <a class="item" href="{{route('registrations.index')}}">
                <div class="ui inline">
                    <i class="users icon large large"></i>
                    Registration
                </div>
            </a>
            <div class="ui left pointing dropdown link item">
                <i class="dropdown icon"></i>
                <span><i class="globe icon large"></i> Page Management</span>
                <div class="menu">
                    <a class="item" href="/pagemanagement">Content</a>
                    <a class="item" href="{{route('scholarships.index')}}">Scholarships</a>
                    <a class="item" href="{{route('admissions.index')}}">Requirements</a>
                </div>
            </div>
            <a class="side item" href="{{route('advertisements.index')}}">
                <div class="ui inline">
                    <i class="audio description icon large"></i>
                    Ad Management
                </div>
            </a>
            @elseif (Auth::user()->role === 'student')
            <a class="item" href="/dashboard/{{Auth::user()->role}}">
                <div class="ui inline">
                    <i class="chart bar outline icon large"></i>
                    Dashboard
                </div>
            </a>
            <a class="item" href="/dashboard/student/profile/{{Auth::user()->user_id}}">
                <div class="ui inline">
                    <i class="user outline icon large"></i>
                    Account Setting
                </div>
            </a>
            <a class="item" href="{{route('favorites.index')}}">
                <div class="ui inline">
                    <i class="heart outline icon large large"></i>
                    Favorites
                </div>
            </a>
            @elseif (Auth::user()->role === 'subadmin')
            <a class="item" href="/dashboard/department">
                <div class="ui inline">
                    <i class="chart bar outline icon large"></i>
                    Dashboard
                </div>
            </a>
            <a class="item" href="/dashboard/department/profile/{{Auth::user()->user_id}}">
                <div class="ui inline">
                    <i class="user outline icon large"></i>
                    Account Setting
                </div>
            </a>
            <a class="item" href="/dashboard/subadmin/registrations/{{Auth::user()->user_id}}">
                <div class="ui inline">
                    <i class="users icon large large"></i>
                    Registration
                </div>
            </a>
            @endif
            <a class="side item" href="{{route('messages.index')}}">
                <div class="ui inline">
                    <i class="envelope outline icon large"></i>
                    Messages
                </div>
            </a>
        </div>
        <div style="margin-bottom: 12.1em;"></div>
    </div>
</div>