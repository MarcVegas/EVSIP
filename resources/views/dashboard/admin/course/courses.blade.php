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
                        <a class="ui blue button" href="{{route('courses.create')}}"><i class="plus icon"></i> Add Course</a>
                    </div>
                </div>
            </div>
        </div>
        <div class="ui basic segment">
            @if (count($courses) > 0)
                <table class="ui selectable celled small table" id="responsive-table">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Title</th>
                            <th>Category</th>
                            <th>Duration</th>
                            <th>Tuition</th>
                            <th>Enrollment</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($courses as $course)
                            <tr>
                                <td>{{$course->course_id}}</td>
                                <td>{{$course->course_name}}</td>
                                <td>{{$course->course_categ}}</td>
                                <td>{{$course->duration}}</td>
                                <td>{{$course->tuition}}</td>
                                <td>{{$course->enrollment}}</td>
                                <td>
                                    <a class="ui view button" href="/dashboard/admin/courses/{{$course->course_id}}"><i class="eye icon"></i> View</a>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            @else 
                <div class="ui basic center aligned segment">
                    <br><br>
                    <img src="/storage/interface/knowledge.png" class="ui centered small image" alt="no courses">
                    <h4>No courses added yet</h4>
                    <p>Press the <strong>Add Course</strong> button to start adding courses</p>
                </div>
            @endif
        </div>
    </div>
</div>
@include('modal.modal-premium')
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