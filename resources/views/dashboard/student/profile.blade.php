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
                        <h2 class="header center aligned" style="color: white;">Profile</h2>
                    </div><br><br>
                        <form class="ui equal width form" id="profile"  action= "{!! action('StudentProfileController@update', Auth::user()->user_id) !!}" method="POST" enctype="multipart/form-data">
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
                            <div class="fields">
                                <div class="field">
                                    <label>Firstname</label>
                                    <input placeholder="Firstname" value="{{$profile->firstname}}" type="text" name="firstname" id="firstname">
                                </div>
                                <div class="field">
                                    <label>Lastname</label>
                                    <input placeholder="Lastname" value="{{$profile->lastname}}" type="text" name="lastname" id="lastname">
                                </div>
                            </div>
                            <div class="fields">
                                <div class="field">
                                    <label>Contact</label>
                                    <input placeholder="(xxx)" value="{{$profile->contact}}" type="text" name="contact" id="contact">
                                </div>
                                <div class="field">
                                    <label>Gender</label>
                                    <select name="gender" id="gender" class="ui dropdown">
                                        @foreach (Cache::get('gender') as $gender)
                                            <option value="{{ $gender }}"{{ ( $profile->gender == $gender ) ? ' selected' : '' }}>{{ $gender }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <input type="hidden" name="_method" value="POST">
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
                        <div class="ui header">Student</div>
                        <div class="meta">Your avatar is displayed publicly for all other users.</div><br>
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