@extends('layouts.dashboard')

@section('content')
@include('inc.sidemenu')
<div class="thirteen wide column" style="padding: 0 !important;">
    @include('inc.navbar-admin')
    <div class="pale" style="margin-top: 1em; min-height: 41em;">
        <div class="ui basic segment">
            <h3>Plan List</h3>
            @if ($data ?? '')
                <table class="ui single line table">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Name</th>
                            <th>Status</th>
                            <th>Description</th>
                            <th>Usage Type</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($data['plans'] as $product)
                            <tr>
                                <td>{{$product['id']}}</td>
                                <td>{{$product['name']}}</td>
                                <td>{{$product['status']}}</td>
                                <td>{{$product['description']}}</td>
                                <td>{{$product['usage_type']}}</td>
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