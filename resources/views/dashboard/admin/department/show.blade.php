@extends('layouts.dashboard')

@section('content')
@include('inc.sidemenu')
<div class="thirteen wide column" style="padding: 0 !important;">
    @include('inc.navbar-admin')
    <div class="pale" style="margin-top: 1em; height: 41em;">
        @include('inc.messages')
        <br><br>
        <div class="ui basic segment">
            <div class="ui stackable grid">
                <div class="eight wide column">
                    <div class="ui segment">
                        <div class="gradient-primary card-icon long">
                            <h2 class="header center aligned" style="color: white;">Update department</h2>
                        </div><br><br>
                        <div class="ui equal width form" id="dep-form">
                            <div class="fields">
                                <div class="field">
                                    <label>Username</label>
                                    <input id="name" type="text" value="{{$user->username}}" readonly>
                                </div>
                                <div class="field">
                                    <label>Email</label>
                                    <input id="email" type="email" value="{{$user->email}}" readonly>
                                </div>
                            </div>
                            <div class="field">
                                <label>Department Name</label>
                                <input id="department" name="department" value="{{$user->department}}" type="text" readonly>
                            </div>
                            <input type="hidden" name="role" id="role" value="subadmin">
                            <div class="ui secondary menu">
                                <div class="item">
                                    <a class="ui button" href="{{route('departments.index')}}">Back</a>
                                </div>
                                <div class="right menu">
                                    <div class="item">
                                        <a class="ui blue button" href="{{$user->user_id}}/edit"><i class="edit icon"></i>Edit</a>
                                    </div>
                                    <div class="item">
                                        <button class="ui red delete button"><i class="trash icon"></i> Delete</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="five wide column">
                    <div class="ui segment center aligned">
                        <div>
                            <img src="/storage/avatars/{{$user->avatar}}" alt="logo" width="30%" class="ui centered circular image" id="userAvatar">
                        </div>
                        <div class="ui header">Sub-admin</div>
                    </div>
                </div>
                <div class="three wide column"></div>
            </div>
        </div>
    </div>
</div>
@endsection