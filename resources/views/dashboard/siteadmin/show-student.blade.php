@extends('layouts.dashboard')

@section('content')
@include('inc.sidemenu')
<div class="thirteen wide column" style="padding: 0 !important;">
    @include('inc.navbar-admin')
    <div class="pale" style="margin-top: 1em; min-height: 41em;">
        @include('inc.messages')
        <br><br>
        <div class="ui basic segment">
            <div class="ui stackable grid">
                <div class="eight wide column">
                    <div class="ui segment">
                    <div class="gradient-primary card-icon long">
                        <h2 class="header center aligned" style="color: white;">Profile</h2>
                    </div><br><br>
                        <div class="ui equal width form">
                            <div class="fields">
                                <div class="field">
                                    <label>Username</label>
                                    <input placeholder="Username" value="{{$profile->username}}" type="text" name="username" readonly>
                                </div>
                                <div class="field">
                                    <label>Email</label>
                                    <input placeholder="Email" value="{{$profile->email}}" type="email" name="email" readonly>
                                </div>
                            </div>
                            <div class="fields">
                                <div class="field">
                                    <label>Firstname</label>
                                    <input placeholder="Firstname" value="{{$profile->firstname}}" type="text" name="firstname" readonly>
                                </div>
                                <div class="field">
                                    <label>Lastname</label>
                                    <input placeholder="Lastname" value="{{$profile->lastname}}" type="text" name="lastname" readonly>
                                </div>
                            </div>
                            <div class="fields">
                                <div class="field">
                                    <label>Contact</label>
                                    <input placeholder="(xxx)" value="{{$profile->contact}}" type="text" name="contact" readonly>
                                </div>
                                <div class="field">
                                    <label>Gender</label>
                                    <input type="text" name="gender" value="{{$profile->gender}}" readonly>
                                </div>
                            </div>
                            <div class="ui secondary menu">
                                <div class="item">
                                    <a class="ui button" href="/dashboard/siteadmin/usermgmt"><i class="angle left"></i> Back</a>
                                </div>
                                <div class="right item">
                                    <button class="ui grey button">Suspend</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="five wide column">
                    <div class="ui segment center aligned">
                        <div>
                            <img src="/storage/avatars/{{$profile->avatar}}" alt="logo" width="30%" class="ui centered circular image" id="userAvatar">
                        </div>
                        <div class="ui header">Student Account</div>
                    </div>
                </div>
                <div class="three wide column"></div>
            </div>
        </div>
    </div>
</div>
@endsection