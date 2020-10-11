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
                        <h2 class="header center aligned" style="color: white;">General Information</h2>
                    </div><br><br>
                        <form class="ui equal width form" id="profile"  action= "{!! action('SubadminProfileController@update', Auth::user()->user_id) !!}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="fields">
                                <div class="field">
                                    <label>Username</label>
                                    <input placeholder="Username" value="{{$profile->username}}" type="text" name="username" id="username">
                                </div>
                                <div class="field">
                                    <label>Email</label>
                                    <input placeholder="Email" value="{{$profile->email}}" type="email" name="email" id="email">
                                </div>
                            </div>
                            <div class="field">
                                <label>Department Name</label>
                                <input placeholder="department" value="{{$profile->department}}" type="text" name="department" id="department">
                            </div>
                            <input type="hidden" name="_method" value="PUT">
                            <div class="ui secondary stackable menu">
                                <div class="item">
                                    <a class="ui button orange" href="{{ route('password.request') }}">Change Password</a>
                                </div>
                                <div class="right item">
                                    <button type="submit" class="ui right labeled icon edit-btn button blue">
                                        <i class="edit outline sub icon"></i>
                                        Update
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
                <div class="five wide column">
                    <div class="ui segment center aligned">
                        <div>
                            <img src="/storage/avatars/{{$profile->avatar}}" alt="logo" width="30%" class="ui centered circular image" id="userAvatar">
                        </div>
                        <div class="ui header">Department</div>
                        <div class="meta">Your avatar is can only be viewed by the school main account</div><br>
                        <input type="file" (change)="fileEvent($event)" form="profile" class="inputfile" name="avatar" id="fileimage"/>
                        <label for="fileimage" class="ui primary button">
                            Change Avatar
                        </label>
                    </div>
                </div>
                <div class="three wide column"></div>
            </div>
        </div>
    </div>
</div>
@endsection