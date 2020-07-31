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
                                    <div class="ui blue buttons">
                                        <a class="ui view button" href="">View</a>
                                        <div class="ui floating tasks dropdown icon button">
                                            <i class="dropdown icon"></i>
                                            <div class="menu">
                                                <a class="item edit" href=""><i class="edit outline icon"></i> Update</a>
                                            </div>
                                        </div>
                                    </div>
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