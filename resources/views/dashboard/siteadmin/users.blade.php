@extends('layouts.dashboard')

@section('content')
@include('inc.sidemenu')
<div class="thirteen wide column" style="padding: 0 !important;">
    @include('inc.navbar-admin')
    <div class="pale" style="margin-top: 1em; height: 41em;">
        <div class="ui tabular menu">
            <a class="item active" data-tab="first">
                Schools
            </a>
            <a class="product item" data-tab="second">
                Students
            </a>
        </div>
        <div class="ui basic active tab segment" data-tab="first">
            @if ($schools ?? '')
                @if (count($schools) > 0)
                    <table class="ui single line table" id="schools-table">
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
                            @foreach ($schools as $school)
                                <tr>
                                    <td><img class="ui avatar centered image" src="/storage/avatars/{{$school->avatar}}" alt=""></td>
                                    <td>{{$school->school_name}}</td>
                                    <td>{{$school->username}}</td>
                                    <td>{{$school->category}}</td>
                                    <td>{{$school->type}}</td>
                                    <td>{{$school->affiliation}}</td>
                                    <td>
                                        <a class="ui button" href="/dashboard/siteadmin/show/school/{{$school->user_id}}"><i class="eye icon"></i> View</a>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                @else
                    <div class="ui basic center aligned segment">
                        <br><br>
                        <img src="/storage/interface/university.png" class="ui centered small image" alt="no registrants">
                        <h4>No schools to display</h4>
                    </div>
                @endif
            @endif
        </div>
        <div class="ui basic tab segment" data-tab="second">
            @if ($students ?? '')
                @if (count($students) > 0)
                    <table class="ui single line table" id="students-table">
                        <thead>
                            <tr>
                                <th>Avatar</th>
                                <th>Username</th>
                                <th>Firstname</th>
                                <th>Lastname</th>
                                <th>Gender</th>
                                <th>Contact</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($students as $student)
                                <tr>
                                    <td><img class="ui avatar centered image" src="/storage/avatars/{{$student->avatar}}" alt=""></td>
                                    <td>{{$student->username}}</td>
                                    <td>{{$student->firstname}}</td>
                                    <td>{{$student->lastname}}</td>
                                    <td>{{$student->gender}}</td>
                                    <td>{{$student->contact}}</td>
                                    <td>
                                        <a class="ui button" href="/dashboard/siteadmin/show/student/{{$student->user_id}}"><i class="eye icon"></i> View</a>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                @else
                    
                @endif
            @endif
        </div>
    </div>
</div>
@endsection

@push('datatables')
<script>
    $(document).ready(function (){
        $('#schools-table').DataTable({
            "lengthMenu": [[5, 10, 20, -1], [5, 10, 20, "All"]],
            "order": [],
            "columnDefs": [ {
                "targets"  : 'no-sort',
                "orderable": false,
            }]
        });

        $('#students-table').DataTable({
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