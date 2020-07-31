@extends('layouts.passwords')

@section('content')
<div class="ui segment">
    <div class="ui horizontal divider">
        <h5>{{ __('Reset Password') }}</h5>
    </div>
    <form class="ui form" method="POST" action="{{ route('password.update') }}">
        @csrf

        <input type="hidden" name="token" value="{{ $token }}">
        <div class="field required">
            <label>{{ __('E-Mail Address') }}</label>
            <input placeholder="Email" type="email" class="@error('email') is-invalid @enderror" name="email" id="email" value="{{ $email ?? old('email') }}" required autocomplete="email" autofocus>
            @error('email')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>
        <div class="field required">
            <label>{{ __('Password') }}</label>
            <input placeholder="Enter new password" type="password" class="@error('password') is-invalid @enderror" name="password" id="password" required autocomplete="new-password">
            @error('password')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>
        <div class="field required">
            <label>{{ __('Confirm Password') }}</label>
            <input placeholder="Confirm password" type="password" name="password_confirmation" id="password-confirm" required autocomplete="new-password">
        </div>
        <button type="submit" class="ui bottom attached blue button">
            {{ __('Reset Password') }}
        </button>
    </form>
</div>
@endsection
