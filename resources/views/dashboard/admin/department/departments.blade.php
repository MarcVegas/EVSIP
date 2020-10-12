@extends('layouts.dashboard')

@section('content')
@include('inc.sidemenu')
<div class="thirteen wide column" style="padding: 0 !important;">
    @include('inc.navbar-admin')
    <div class="pale" style="margin-top: 1em; height: 41em;">
        @include('inc.messages')
        <div class="ui basic segment">
            <div class="ui secondary menu">
                <div class="right menu">
                   <div class="item">
                    <a class="ui blue button" href="{{route('departments.create')}}"><i class="plus icon"></i> Add Department</a>
                   </div>
                </div>
            </div>
        </div>
        <div class="ui basic segment">
            @if (count($departments) > 0)
                <table class="ui selectable celled small table" id="responsive-table">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Username</th>
                            <th>Email</th>
                            <th>Department</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($departments as $department)
                            <tr>
                                <td>{{$department->user_id}}</td>
                                <td>{{$department->username}}</td>
                                <td>{{$department->email}}</td>
                                <td>{{$department->department}}</td>
                                <td>
                                    <a class="ui view button" href="/dashboard/admin/departments/{{$department->user_id}}"><i class="eye icon"></i> View</a>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            @else 
                <div class="ui basic center aligned segment">
                    <br><br>
                    <img src="/storage/interface/department.png" class="ui centered small image" alt="no courses">
                    <h4>No departments added yet</h4>
                    <h5>Departments help manage registrations and messages related to them</h5>
                    <p>Press the <strong>Add Department</strong> button to start adding departments</p>
                </div>
            @endif
        </div>
    </div>
</div>
@endsection

@push('datatables')
<script>
    $(document).ready(function (){
        $('#responsive-table').DataTable({
            "lengthMenu": [[5, 10, 20, -1], [5, 10, 20, "All"]],
            "order": [],
            "columnDefs": [ {
                "targets"  : 'no-sort',
                "orderable": false,
            }]
        });
    });
</script>
@endpush