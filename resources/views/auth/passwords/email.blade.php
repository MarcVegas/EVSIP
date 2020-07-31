@extends('layouts.passwords')

@section('content')
<div class="ui segment">
    @if (session('status'))
        <div class="ui success message">
            <p>{{ session('status') }}</p>
        </div>
    @endif
    <form class="ui form" method="POST" action="{{ route('password.email') }}">
        @csrf

        <div class="field required">
            <label>{{ __('E-Mail Address') }}</label>
            <input placeholder="Email" type="email" class="@error('email') is-invalid @enderror" name="email" id="email" value="{{ $email ?? old('email') }}" required autocomplete="email" autofocus>
            @error('email')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>

        <button type="submit" class="ui bottom attached fluid blue button">
            {{ __('Send Password Reset Link') }}
        </button>
    </form>
</div>
@endsection
