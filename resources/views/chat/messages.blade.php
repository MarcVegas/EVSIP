@extends('layouts.dashboard')

@section('content')
@include('inc.sidemenu')
<div class="thirteen wide column" style="padding: 0 !important;">
    @include('inc.navbar-admin')
    <div class="pale" style="margin-top: 1em; height: 41em;">
        <div class="ui basic padded segment">
            <div class="ui stackable grid">
                <div class="four wide column">
                    {{-- <div class="ui top attached clearing segment">
                        <p class="ui left floated large header" style="color: #434a77;font-weight:bolder">Chat</p>
                        <button class="ui right floated icon button"><i class="ellipsis vertical icon"></i></button>
                    </div> --}}
                    <div class="ui attached segment" style="overflow-y:auto;max-height:32em">
                        <h2 style="color: #434a77;">Chat</h2>
                        {{-- <button class="ui icon button"><i class="ellipsis vertical icon"></i></button> --}}
                        <hr>
                        
                    </div>
                </div>
                <div class="seven wide column">
                    <div class="ui grid">
                        <div class="row">
                            <div class="nine wide column">
                            <h3>{{$messages->username}}</h3>
                            </div>
                            <div class="seven wide right aligned column">
                                @if (Auth::user()->role == 'admin')
                                    <div class="ui tiny basic icon labeled floating dropdown button">
                                        <i class="user outline icon"></i>
                                        <span class="text"><img class="ui mini avatar image" src="/storage/avatars/{{Auth::user()->avatar}}" alt="">{{Auth::user()->username}}</span>
                                        <div class="left menu">
                                            <div class="header">Assign to</div>
                                            @if (count($departments) > 0)
                                                @foreach ($departments as $department)
                                                    <div class="item">
                                                        <img class="ui mini avatar image" src="/storage/avatars/{{$department->avatar}}" alt="">
                                                        {{$department->username}}
                                                    </div>
                                                @endforeach
                                            @endif
                                        </div>
                                    </div>
                                @endif
                                <button class="ui tiny basic icon button"><i class="trash alternate outline icon"></i></button>
                            </div>
                        </div>
                        <div class="row">
                            <div class="sixteen wide column" style="overflow-y:auto;max-height:30em">
                                @if (count($messages) > 0)
                                    <ul>
                                        @foreach ($messages as $message)
                                            @if (Auth::user()->user_id == $message->user_id)
                                                <li class="receiver">{{$message->body}}</li>
                                            @else 
                                                <li class="sender">{{$message->body}}</li>
                                            @endif
                                        @endforeach
                                    </ul>
                                @endif
                            </div>
                        </div>
                    </div>
                    <div class="ui grid">
                        <div class="row">
                            <div class="twelve wide column">
                                <div class="ui fluid input">
                                    <input type="text" placeholder="Type your message">
                                </div>
                            </div>
                            <div class="four wide column">
                                <button class="ui blue icon labeled circular button" tabindex="0">
                                    <i class="paper plane icon"></i>
                                    Send
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="five wide column">
                    <div class="ui segment">
                        <h2 style="color: #434a77;">Profile</h2>
                        <hr>
                        <div class="ui secondary menu">
                            <a class="active item" data-tab="first">Profile</a>
                            <a class="item" data-tab="second">Responses</a>
                            <a class="item" data-tab="third">Files</a>
                        </div>
                        <div class="ui basic center aligned active tab segment" data-tab="first">
                            @if (!empty($profile))
                                <img class="ui circular centered image" src="/storage/avatars/{{$profile->avatar}}" alt="" width="100px">
                                <h3>Omar Cayambulan</h3>
                                <a class="ui brown label">Student</a>
                                <div class="ui link raised two cards" style="margin-top: 1em;">
                                    <div class="ui card">
                                        <div class="ui basic segment">
                                            <div class="image">
                                                <img class="ui mini centered image" src="images/file.png" alt="">
                                            </div>
                                        </div>
                                        <div class="content">TOR</div>
                                    </div>
                                    <div class="ui card">
                                        <div class="ui basic segment">
                                            <div class="image">
                                                <img class="ui mini centered image" src="images/file.png" alt="">
                                            </div>
                                        </div>
                                        <div class="content">Form 137</div>
                                    </div>
                                </div>
                            @else 
                                
                            @endif
                        </div>
                        <div class="ui basic tab segment" data-tab="second">
                            <div class="ui middle aligned horizontal list">
                                <div class="item">
                                    <a class="ui brown label">Requirements</a>
                                    <div class="ui flowing popup top left transition hidden">
                                        <h5>Requirements</h5>
                                        <p>Lorem ipsum dolor, sit amet consectetur adipisicing elit.
                                             Reiciendis eligendi, excepturi accusamus dolorem perspiciatis</p>
                                    </div>
                                </div>
                                <div class="item">
                                    <a class="ui brown label">Enrollment period</a>
                                </div>
                                <div class="item">
                                    <a class="ui brown label">Scholarship</a>
                                </div>
                                <div class="item">
                                    <a class="ui brown label">Courses</a>
                                </div>
                            </div>
                            <h5>Add new automated response</h5>
                            <form class="ui form">
                                <div class="field">
                                    <label>Keyword</label>
                                    <input type="text" placeholder="Enter keyword">
                                </div>
                                <div class="field">
                                    <label>Response</label>
                                    <textarea rows="2" placeholder="Enter response"></textarea>
                                </div>
                                <button class="ui inverted violet icon labeled fluid button">Add Keyword <i class="plus icon"></i></button>
                            </form>
                        </div>
                        <div class="ui basic tab segment" data-tab="third">
                            <div class="ui link raised two cards">
                                <div class="ui card">
                                    <div class="ui basic segment">
                                        <div class="image">
                                            <img class="ui mini centered image" src="images/file.png" alt="">
                                        </div>
                                    </div>
                                    <div class="content">Enrollment Form</div>
                                    <button class="ui inverted blue button">Attach</button>
                                </div>
                                <div class="ui card">
                                    <div class="ui basic segment">
                                        <div class="image">
                                            <img class="ui mini centered image" src="images/file.png" alt="">
                                        </div>
                                    </div>
                                    <div class="content">Brochure</div>
                                    <button class="ui inverted blue button">Attach</button>
                                </div>
                            </div>
                            <div class="ui pale very padded center aligned segment">
                                <div class="ui tiny header">
                                    Drag file here or click the button below
                                </div>
                            </div>
                            <div class="ui small fluid primary button">Add Document</div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection