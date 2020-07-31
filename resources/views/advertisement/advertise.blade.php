@extends('layouts.dashboard')

@section('content')
@include('inc.sidemenu')
<div class="thirteen wide column" style="padding: 0 !important;">
    @include('inc.navbar-admin')
    <div class="pale" style="margin-top: 1em; height: 41em;">
        @include('inc.messages')
        <div class="ui basic padded segment">
            <div class="ui secondary menu">
                <a href="/dashboard/admin" class="item" style="color: blue;font-weight:bolder"><i class="chart bar outline icon"></i> View page statistics</a>
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
                                    <div class="ui blue buttons">
                                        <a class="ui view button" href="">View</a>
                                        <div class="ui floating tasks dropdown icon button">
                                            <i class="dropdown icon"></i>
                                            <div class="menu">
                                                <a class="item edit" href=""><i class="edit outline icon"></i> Edit</a>
                                                <a class="item "><i class="pause icon"></i> Suspend</a>
                                                <a class="item deny"><i class="delete icon"></i> Remove</a>
                                            </div>
                                        </div>
                                    </div>
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
    </div>
</div>
@include('modal.modal-premium')
@endsection