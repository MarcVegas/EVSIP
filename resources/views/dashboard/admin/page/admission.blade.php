@extends('layouts.dashboard')

@section('content')
@include('inc.sidemenu')
<div class="thirteen wide column" style="padding: 0 !important;">
    @include('inc.navbar-admin')
    <div class="pale" style="margin-top: 1em; height: 41em;">
        @include('inc.messages')
        <div class="ui basic segment">
            <h2 style="color: #434a77;"><i class="clipboard list icon"></i> Manage enrollee requirements</h2>
            <div class="ui stackable grid">
                <div class="nine wide column">
                    <div class="ui basic very padded segment">
                        <form class="ui form" action="{{route('admissions.store')}}" method="POST">
                            @csrf
                            <div class="field">
                                <label>Enrollee Type</label>
                                <select class="ui dropdown" name="enrolee_type" id="enrolee_type">
                                    <option value="">Select type</option>
                                    <option value="freshmen">freshmen</option>
                                    <option value="transferee">transferee</option>
                                    <option value="cross-enrollee">cross-enrollee</option>
                                    <option value="second courser">second courser</option>
                                </select>
                            </div>
                            <div class="field">
                                <label>Requirements</label>
                                <textarea name="body" id="ckeditor-textarea"></textarea>
                            </div>
                            <button class="ui right floated green button" type="submit">Submit</button>
                        </form>
                    </div>
                </div>
                <div class="six wide column">
                    <div class="ui segment" style="overflow-y:auto;max-height:34em">
                        @if (count($admissions) > 0)
                            <div class="ui relaxed list">
                                @foreach ($admissions as $admission)
                                <div class="item">
                                    <div style="border-radius:10px !important;" class="ui secondary raised clearing segment">
                                        <div class="ui icon right floated pointing dropdown button">
                                        <i class="ellipsis vertical icon"></i>
                                            <div class="menu">
                                                <a class="edit item" href="/admissions/{{$admission->id}}/edit"><i class="edit icon"></i> Edit</a>
                                                <a class="item" href="#"><i class="trash icon"></i> Delete</a>
                                            </div>
                                        </div>
                                        <p style="font-style:italic">Added on: {{$admission->created_at}}</p>
                                        <p  class="ui grey header">{{$admission->enrolee_type}}</p>
                                    </div>
                                </div>
                                @endforeach
                            </div>
                        @else 
                            <div class="ui basic center aligned segment">
                                <br><br>
                                <img src="/storage/interface/box.png" class="ui centered small image" alt="no scholarships">
                                <h4>No admission requirements added yet</h4>
                            </div>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection