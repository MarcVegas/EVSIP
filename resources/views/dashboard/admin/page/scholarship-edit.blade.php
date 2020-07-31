@extends('layouts.dashboard')

@section('content')
@include('inc.sidemenu')
<div class="thirteen wide column" style="padding: 0 !important;">
    @include('inc.navbar-admin')
    <div class="pale" style="margin-top: 1em; height: 41em;">
        @include('inc.messages')
        <div class="ui basic segment">
            <h2 style="color: #434a77;"><i class="graduation cap icon"></i> Edit scholarship</h2>
            <div class="ui stackable grid">
                <div class="nine wide column">
                    <div class="ui basic very padded segment">
                        <form class="ui form" action="{!! action('ScholarshipsController@update', $scholar->id) !!}" method="POST" id="scholar-form">
                            @csrf
                            <div class="field">
                                <label>Scholarship Provider</label>
                                <input type="text" value="{{$scholar->provider}}" name="provider" id="provider" required>
                            </div>
                            <div class="field">
                                <label>Scholarship Name</label>
                                <input type="text" value="{{$scholar->title}}" name="title" id="title" required>
                            </div>
                            <div class="field">
                                <label>Requirements</label>
                                <textarea name="body" id="ckeditor-textarea">
                                    {!! $scholar->body !!}
                                </textarea>
                            </div>
                            <input type="hidden" name="_method" value="PUT">
                            <button class="ui right floated blue button" type="submit">Update</button>
                        </form>
                    </div>
                </div>
                <div class="six wide column">
                    <div class="ui segment" style="overflow-y:auto;max-height:34em">
                        @if (count($scholarships) > 0)
                            <div class="ui relaxed list">
                                @foreach ($scholarships as $scholarship)
                                <div class="item">
                                    <div style="border-radius:10px !important;" class="ui secondary raised clearing segment">
                                        <div class="ui icon right floated pointing dropdown button">
                                        <i class="ellipsis vertical icon"></i>
                                            <div class="menu">
                                                <a class="edit item" id="{{$scholarship->id}}"><i class="edit icon"></i> Edit</a>
                                                <a class="item" href="#"><i class="trash icon"></i> Delete</a>
                                            </div>
                                        </div>
                                        <p style="font-style:italic">Added on: {{$scholarship->created_at}}</p>
                                        <p  class="ui grey header">{{$scholarship->provider}}</p>
                                        <p class="ui small sub header">{{$scholarship->title}}</p>
                                    </div>
                                </div>
                                @endforeach
                            </div>
                        @else 
                            <div class="ui basic center aligned segment">
                                <br><br>
                                <img src="/storage/interface/box.png" class="ui centered small image" alt="no scholarships">
                                <h4>No scholarships added yet</h4>
                            </div>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection