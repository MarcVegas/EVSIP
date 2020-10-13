@extends('layouts.dashboard')

@section('content')
@include('inc.sidemenu')
<div class="thirteen wide column" style="padding: 0 !important;">
    @include('inc.navbar-admin')
    <div class="pale" style="margin-top: 1em; height: 41em;">
        @include('inc.messages')
        @if ($premiumCheck->membership == 'premium')
        <div class="ui basic padded segment">
            <div class="ui secondary menu">
                
                <div class="right menu">
                    <a class="ui blue button" href="{{route('advertisements.create')}}"><i class="plus icon"></i> New Campaign</a>
                </div>
            </div>
        </div>
        <div class="ui basic segment">
            @if ($advertisements ?? '')
                <table class="ui selectable celled small table">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Title</th>
                            <th>Status</th>
                            <th>Start Date</th>
                            <th>Expiry Date</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($advertisements as $advertisement)
                            <tr>
                                <td>{{$advertisement->id}}</td>
                                <td>{{$advertisement->title}}</td>
                                <td>{{$advertisement->status}}</td>
                                <td>{{$advertisement->created_at}}</td>
                                <td>{{$advertisement->expiry_date}}</td>
                                <td>
                                    <a class="ui button" href="advertisements/{{$advertisement->id}}/edit"><i class="edit outline icon"></i> Edit</a>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            @else 
                <div class="ui basic center aligned segment">
                    <br><br>
                    <img src="/storage/interface/megaphone.png" class="ui centered small image" alt="no ads">
                    <h4>No advertising campaigns started yet</h4>
                </div>
            @endif
        </div>
        @else
            <div class="ui basic center aligned padded segment">
                <br><br>
                <img src="/storage/interface/podium.png" class="ui centered small image" alt="no reports">
                <h4>YOU DISCOVERED A PREMIUM FEATURE!</h4>
                <p>Go premium and get access to ads, featured courses, and more</p>
            </div>
        @endif
    </div>
</div>
@include('modal.modal-premium')
@endsection