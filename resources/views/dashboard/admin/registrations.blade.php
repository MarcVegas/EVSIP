@extends('layouts.dashboard')

@section('content')
@include('inc.sidemenu')
<div class="thirteen wide column" style="padding: 0 !important;">
    @include('inc.navbar-admin')
    <div class="pale" style="margin-top: 1em; height: 41em;">
        @include('inc.messages')
        <div class="ui basic segment">
            <h3>Pending Registrations</h3>
            @if ($registrations ?? '')
                <table class="ui selectable celled small table">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Username</th>
                            <th>Firstname</th>
                            <th>Lastname</th>
                            <th>Type</th>
                            <th>Status</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($registrations as $registrant)
                            <tr>
                                <td>{{$registrant->user_id}}</td>
                                <td>{{$registrant->username}}</td>
                                <td>{{$registrant->firstname}}</td>
                                <td>{{$registrant->lastname}}</td>
                                <td>{{$registrant->type}}</td>
                                <td>{{$registrant->status}}</td>
                                <td>
                                    <div class="ui blue buttons">
                                        <a class="ui view button" href="/dashboard/admin/registrations/{{$registrant->user_id}}">Review</a>
                                        <div class="ui floating tasks dropdown icon button">
                                            <i class="dropdown icon"></i>
                                            <div class="menu">
                                                <a class="item edit" href=""><i class="edit outline icon"></i> Approve</a>
                                                <a class="item deny"><i class="delete icon"></i> Deny</a>
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
                    <img src="/storage/interface/student2.png" class="ui centered small image" alt="no courses">
                    <h4>No students have registered yet</h4>
                    <p>Want to attract more students? Go <strong>Premium</strong> and start an Ad Campaign for free*</p>
                </div>
            @endif
        </div>
    </div>
</div>
@include('modal.modal-premium')
@endsection