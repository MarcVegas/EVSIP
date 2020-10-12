@extends('layouts.dashboard')

@section('content')
@include('inc.sidemenu')
<div class="thirteen wide column" style="padding: 0 !important;">
    @include('inc.navbar-admin')
    <div class="pale" style="margin-top: 1em; min-height: 41em;">
        <div class="ui basic segment">
            <h3>Plan</h3>
            <div class="ui stackable grid">
                <div class="ten wide column">
                    <div class="ui raised segment">
                        <div class="ui equal width form">
                            <div class="field">
                                <label>Plan ID</label>
                                <input type="text" value="{{$data['id']}}" readonly>
                            </div>
                            <div class="fields">
                                <div class="field">
                                    <label>Plan Name</label>
                                    <input type="text" value="{{$data['name']}}" readonly>
                                </div>
                                <div class="field">
                                    <label>Status</label>
                                    <input type="text" value="{{$data['status']}}" readonly>
                                </div>
                            </div>
                            <div class="field">
                                <label>Status</label>
                                <input type="text" value="{{$data['status']}}" readonly>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="six wide column"></div>
            </div>
        </div>
    </div>
</div>
@endsection