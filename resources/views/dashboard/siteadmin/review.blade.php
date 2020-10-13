@extends('layouts.dashboard')

@section('content')
@include('inc.sidemenu')
<div class="thirteen wide column" style="padding: 0 !important;">
    @include('inc.navbar-admin')
    <div class="pale" style="margin-top: 1em; height: 41em;">
        <br><br>
        <div class="ui basic segment">
            <div class="ui stackable grid">
                <div class="ten wide column">
                    <div class="ui segment">
                        <div class="gradient-primary card-icon long">
                            <h2 class="header center aligned" style="color: white;">Information</h2>
                        </div><br><br>
                        <div class="ui equal width form">
                            <div class="fields">
                                <div class="field">
                                    <label>School ID</label>
                                    <input type="text" value="{{$review->school_id}}" name="school_id" id="school_id" readonly>
                                </div>
                                <div class="field">
                                    <div class="field">
                                        <label>School Name</label>
                                        <input type="text" value="{{$review->school_name}}" name="school_name" id="school_name" readonly>
                                    </div>
                                </div>
                            </div>
                            <div class="fields">
                                <div class="field">
                                    <label>Category</label>
                                    <input type="text" value="{{$review->category}}" name="category" id="category" readonly>
                                </div>
                                <div class="field">
                                    <label>Type</label>
                                    <input type="text" value="{{$review->type}}" name="type" id="type" readonly>
                                </div>
                                <div class="field">
                                    <label>Affiliation</label>
                                    <input type="text" value="{{$review->affiliation}}" name="affiliation" id="affiliation" readonly>
                                </div>
                            </div>
                            <div class="fields">
                                <div class="field">
                                    <label>Entrance Exam</label>
                                    <input type="text" value="{{$review->exam}}" name="exam" id="exam" readonly>
                                </div>
                                <div class="field">
                                    <label>Contact</label>
                                    <input type="text" value="{{$review->contact}}" name="contact" id="contact" readonly>
                                </div>
                                <div class="field">
                                    <label>Membership</label>
                                    <input type="text" value="{{$review->membership}}" name="membership" id="membership" readonly>
                                </div>
                            </div><br><br>
                            <div class="actions">
                                <button class="ui red appdeny button"><i class="delete icon"></i> Deny</button>
                                <a href="/dashboard/siteadmin/approve/{{$review->school_id}}" class="ui green right floated button"><i class="check icon"></i> Approve</a>
                            </div>
                        </div>
                        
                    </div>
                </div>
                <div class="six wide column">
                    <div class="ui segment" style="overflow-y:auto;max-height:32em;">
                        <h2 style="color: #434a77;">Documents</h2>
                        <hr>
                        <div class="ui large middle aligned selection list">
                            @if (count($documents) > 0)
                                @foreach ($documents as $document)
                                    <a class="item" href="/storage/documents/{{$document->filename}}" target="_blank">
                                        @if ($document->ext == 'pdf')
                                            <img class="ui mini left floated image" src="/storage/documents/pdf.png">
                                        @else
                                            <img class="ui mini left floated image" src="/storage/documents/{{$document->filename}}">
                                        @endif
                                        <div class="content">
                                            <div class="header">{{$document->filename}}</div>
                                            Click to view
                                        </div>
                                    </a>
                                @endforeach
                            @else
                                <div class="ui basic center aligned segment">
                                    <h3>No documents submitted</h3>
                                </div>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="ui mini appdeny modal">
    <i class="close icon"></i>
    <div class="header">Reject Application?</div>
    <div class="content">
        <form class="ui form" action="{!! action('SchoolRegistrationController@deny', $review->school_id) !!}" method="GET">
            <div class="field">
                <textarea name="reason" id="cekeditor-textarea" placeholder="Please provide reason for rejection" required></textarea>
            </div>
            <button class="ui right floated red button" type="submit">Confirm</button>
        </form>
    </div>
</div>
@endsection