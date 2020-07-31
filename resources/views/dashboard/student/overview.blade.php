@extends('layouts.dashboard')

@section('content')
@include('inc.sidemenu')
<div class="thirteen wide column" style="padding: 0 !important;">
    @include('inc.navbar-admin')
    <div class="pale" style="margin-top: 1em; height: 41em;">
        <div class="ui basic padded segment">
            <div class="ui basic center aligned segment">
                <br><br>
                <img src="/storage/interface/laptop.png" class="ui centered small image" alt="no reports">
                <h4>No reports can be generated yet</h4>
                <p>This is common for new accounts. Once more data can be collected statistics will appear</p>
            </div>
        </div>
    </div>
</div>
@endsection