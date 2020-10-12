@extends('layouts.dashboard')

@section('content')
@include('inc.sidemenu')
<div class="thirteen wide column" style="padding: 0 !important;">
    @include('inc.navbar-admin')
    <div class="pale" style="margin-top: 1em; min-height: 41em;">
        <div class="ui basic segment">
            <h3>Subscriber List</h3>
            @if ($subscribers ?? '')
                <table class="ui single line table">
                    <thead>
                        <tr>
                            <th>Logo</th>
                            <th>Name</th>
                            <th>Abbrv.</th>
                            <th>Category</th>
                            <th>Type</th>
                            <th>Affiliation</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($subscribers as $subscriber)
                            <tr>
                                <td><img class="ui avatar centered image" src="/storage/avatars/{{$subscriber->avatar}}" alt=""></td>
                                <td>{{$subscriber->school_name}}</td>
                                <td>{{$subscriber->username}}</td>
                                <td>{{$subscriber->category}}</td>
                                <td>{{$subscriber->type}}</td>
                                <td>{{$subscriber->affiliation}}</td>
                                <td>
                                    <a class="ui view button" href="/dashboard/siteadmin/show/school/{{$subscriber->user_id}}"><i class="eye icon"></i> View</a>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            @else
                
            @endif
        </div>
    </div>
</div>
@endsection