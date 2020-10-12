@extends('layouts.dashboard')

@section('content')
@include('inc.sidemenu')
<div class="thirteen wide column" style="padding: 0 !important;">
    @include('inc.navbar-admin')
    <div class="pale" style="margin-top: 1em; min-height: 41em;">
        <div class="ui basic segment">
            <h2>Advertisements</h2><br>
            @if ($advertisements ?? '')
                <table class="ui selectable celled small table" id="responsive-table">
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
                                    <a class="ui button" href="advertisements/{{$advertisement->id}}"><i class="eye icon"></i> view</a>
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