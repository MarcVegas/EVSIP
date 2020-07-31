@extends('layouts.app')

@section('content')
<div class="ui basic compressed segment">
    <div class="ui stackable centered padded grid">
        <div class="white row">
            <div class="ten wide center aligned column">
                <img class="ui small image" src="/storage/interface/logotextdark.png" alt="">
                <img class="ui medium centered image" src="/storage/interface/education (1).png" alt="">
                <br>
                <h3 class="boldheader" style="text-align: center;font-weight: 300;">The Platform for Schools and Students</h3>
                <hr style="width: 50%;">
                <p style="text-align: center;">
                Click the button below to learn more</p>
                <a class="ui inverted violet button" href="learnmore.html">Learn More</a><br>
            </div>
            <div class="six wide blue column">
                <div class="ui basic padded segment">
                    <h1 class="boldheader" style="font-size: 2.5em;">{{ __('Login | Register') }}</h1>
                    <h2 class="ui inverted header">
                        Hello there
                        <div class="sub header">To get started. Please login with your account</div>
                    </h2>
                    <div class="ui basic padded segment">
                        <form class="ui inverted form" method="POST" action="{{ route('login') }}">
                            @csrf
        
                            <div class="field">
                                <label class="loglabel"><i class="envelope icon"></i>{{ __('E-Mail Address') }}</label>
                                <div class="ui inverted transparent input">
                                <input id="email" type="email" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>
                                </div>
                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="field">
                                <label class="loglabel"><i class="lock icon"></i>{{ __('Password') }}</label>
                                <div class="ui inverted transparent input">
                                <input id="password" type="password" name="password" required autocomplete="current-password">
                                </div>
                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="field">
                                <div class="ui checkbox">
                                    <input type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>
                                    <label for="remember">{{ __('Remember Me') }}</label>
                                </div>
                            </div>
                            <button type="submit" class="ui ok inverted basic fluid large login button">{{ __('Login') }}</button><br>
                        </form>
                        @if (Route::has('register'))
                        <a class="ui black fluid large register button" >{{ __('Register') }}</a><br>
                        @endif
                        @if (Route::has('password.request'))
                        <p style="text-align: center;font-weight: bolder;">Forgot your password? Click
                            <a style="color: yellowgreen;" href="{{ route('password.request') }}">here</a>
                        </p>
                       @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@include('modal.modal-register')
@endsection
