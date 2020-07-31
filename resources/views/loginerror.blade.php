@extends('layouts.prompt')

@section('content')
<div class="bg">
    <br><br><br><br>
    <div class="ui basic center aligned segment">
        <i class="exclamation triangle icon"></i>
        <h1 class="title">Oops</h1>
        <p class="subtitle">It looks likes this account is still <strong>INACTIVE</strong>. You must wait for your account application to
        be verified before you can use your school account.</p>
        <h4 class="ui paragraph">If you think this is a mistake or you're having problems logging in. Please contact us
            my messaging evsipsupport@gmail.com
        </h4>
        
        <a class="ui blue large button" href="{{ route('logout') }}" onclick="event.preventDefault();
        document.getElementById('logout-form').submit();">
            Go Back
        </a>
        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
            @csrf
        </form>
    </div>
</div>
@endsection