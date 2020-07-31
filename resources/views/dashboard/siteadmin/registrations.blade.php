@extends('layouts.dashboard')

@section('content')
@include('inc.sidemenu')
<div class="thirteen wide column" style="padding: 0 !important;">
    @include('inc.navbar-admin')
    <div class="pale" style="margin-top: 1em; height: 41em;">
        <div class="ui basic segment">
            <div class="ui pointing menu">
                <a href="#" class="active item" data-tab="first">Pending</a>
                <a href="#" class="item" data-tab="second">Resubmissions</a>
                <div class="right menu">
                    <div class="item">
                        <button class="ui button">Guidelines</button>
                    </div>
                    <div class="item">
                        <div class="ui left icon input">
                            <input type="text" placeholder="Search...">
                            <i class="search icon"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="ui basic segment">
        @if (count($registrants) > 0)
            <table class="ui selectable celled small table">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>School Name</th>
                        <th>Category</th>
                        <th>Type</th>
                        <th>Affiliation</th>
                        <th>Contact</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($registrants as $registrant)
                        <tr>
                            <td>{{$registrant->school_id}}</td>
                            <td>{{$registrant->school_name}}</td>
                            <td>{{$registrant->category}}</td>
                            <td>{{$registrant->type}}</td>
                            <td>{{$registrant->affiliation}}</td>
                            <td>{{$registrant->contact}}</td>
                            <td>
                                <div class="ui blue buttons">
                                    <a class="ui view button" href="/dashboard/siteadmin/review/{{$registrant->school_id}}">Review</a>
                                    <div class="ui floating tasks dropdown icon button">
                                        <i class="dropdown icon"></i>
                                        <div class="menu">
                                            <a class="item edit" href="/dashboard/siteadmin/approve/{{$registrant->school_id}}"><i class="check icon"></i> Approve</a>
                                            <a class="item deny"><i class="delete icon"></i> Deny</a>
                                        </div>
                                    </div>
                                </div>
                            </td>
                        </tr>
                    @endforeach
                    
                </tbody>
            </table>
            {{$registrants->links()}}
        @else
            <div class="ui basic center aligned segment">
                <br><br>
                <img src="/storage/interface/university.png" class="ui centered small image" alt="no registrants">
                <h4>No pending school applications avaialable</h4>
            </div>
        @endif
        
        </div>
    </div>
</div>
@endsection