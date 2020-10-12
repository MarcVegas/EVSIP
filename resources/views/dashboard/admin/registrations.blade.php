@extends('layouts.dashboard')

@section('content')
@include('inc.sidemenu')
<div class="thirteen wide column" style="padding: 0 !important;">
    @include('inc.navbar-admin')
    <div class="pale" style="margin-top: 1em; height: 41em;">
        @include('inc.messages')
        <div class="ui tabular menu">
            <a class="item active" data-tab="first">
                Pending
            </a>
            <a class="product item" data-tab="second">
                All
            </a>
        </div>
        <div class="ui basic active tab segment" data-tab="first">
            <h3>Pending Registrations</h3>
            @if ($registrations ?? '')
                <table class="ui selectable celled small table" id="responsive-table">
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
                                    <a class="ui view button" href="/dashboard/admin/registrations/{{$registrant->user_id}}">Review</a>
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
        <div class="ui basic tab segment" data-tab="second">
            @if ($all ?? '')
                <table class="ui selectable celled small table" id="all-table">
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
                        @foreach ($all as $item)
                            <tr>
                                <td>{{$item->user_id}}</td>
                                <td>{{$item->username}}</td>
                                <td>{{$item->firstname}}</td>
                                <td>{{$item->lastname}}</td>
                                <td>{{$item->type}}</td>
                                <td>{{$item->status}}</td>
                                <td>
                                    <a class="{{($item->status == 'approved') ? 'ui view disabled button' : 'ui view button'}}" href="/dashboard/admin/registrations/{{$item->user_id}}">Review</a>
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

        $('#all-table').DataTable({
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