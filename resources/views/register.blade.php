@extends('layouts.preview')

@section('content')
@include('inc.messages')
<div class="ui basic padded segment">
    <div class="ui stackable grid">
        <div class="two wide column"></div>
        <div class="eight wide column">
            <div class="ui secondary inverted menu">
                <a class="active item" data-tab="first">Course</a>
                <a class="item" data-tab="second">Requirements</a>
            </div>
            <div class="ui basic active tab segment" data-tab="first" style="color:white">
                <h2>{{$course->course_name}}</h2>
                <p><i class="university orange icon"></i> {{$school->school_name}} <a class="ui blue tiny label" href="/page/{{$school->school_id}}">visit school</a></p>
                <strong>Details</strong><br>
                <div class="ui relaxed inverted horizontal divided large list">
                    <div class="item">
                        <div class="content">
                            <div class="header">Duration</div>
                            {{$course->duration}}
                        </div>
                    </div>
                    <div class="item">
                        <div class="content">
                            <div class="header">Tuition</div>
                            {{$course->tuition}}
                        </div>
                    </div>
                    <div class="item">
                        <div class="content">
                            <div class="header">Enrollment</div>
                            {{$course->enrollment}}
                        </div>
                    </div>
                </div>
                <div class="ui inverted secondary segment">
                    <h5>IMPORTANT</h5>
                    <div class="ui bulleted small list">
                        <div class="item">Make sure you submit all requirements that are listed</div>
                        <div class="item">We recommend sending a scanned copy or pdf of your requirements.</div>
                        <div class="item">Photographs of requirements are fine as long as the photo is clear and shot in a well lit room</div>
                    </div>
                </div>
                <div class="ui blue inverted progress" data-percent="5" id="uploadedfiles">
                    <div class="bar"></div>
                    <div class="upload label">0 files uploaded</div>
                </div>
            </div>
            <div class="ui basic tab segment" data-tab="second" style="color:white">
                <h4><i class="file orange icon"></i> Make sure to submit the following requirements</h4>
                <div class="ui inverted accordion">
                    <div class="title">
                        <i class="dropdown icon"></i>
                        What is a dog?
                    </div>
                    <div class="content">
                        <p class="transition hidden">A dog is a type of domesticated animal. Known for its loyalty and faithfulness, it can be found as a welcome guest in many households across the world.</p>
                    </div>
                    <div class="title">
                        <i class="dropdown icon"></i>
                        What kinds of dogs are there?
                    </div>
                    <div class="content">
                        <p>There are many breeds of dogs. Each breed varies in size and temperament. Owners often select a breed of dog that they find to be compatible with their own lifestyle and desires from a companion.</p>
                    </div>
                    <div class="title">
                        <i class="dropdown icon"></i>
                        How do you acquire a dog?
                    </div>
                    <div class="content">
                        <p>Three common ways for a prospective owner to acquire a dog is from pet shops, private owners, or shelters.</p>
                        <p>A pet shop may be the most convenient way to buy a dog. Buying a dog from a private owner allows you to assess the pedigree and upbringing of your dog before choosing to take it home. Lastly, finding your dog from a shelter, helps give a good home to a dog who may not find one so readily.</p>
                    </div>
                </div>
            </div>
        </div>
        <div class="four wide column">
            <div class="ui basic segment">
                <form class="ui inverted form" id="register" action="{{ route('pages.store')}}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="field">
                        <label>Fullname</label>
                        <div class="ui transparent inverted input">
                            <input type="text" value="{{$student->firstname}} {{$student->lastname}}" name="fname" id="fname" readonly>
                        </div>
                    </div>
                    <div class="field">
                        <label>Registering as</label>
                        <div style="border-bottom: 2px solid rgba(240, 114, 30, .5);">
                            <select name="enrolee_type" id="enrolee_type">
                                <option value="">Please select one</option>
                                @foreach (Cache::get('enrolee') as $enrolee)
                                    <option value="{{ $enrolee }}">{{ $enrolee }}</option>
                                @endforeach
                            </select>
                        </div>
                        
                    </div>
                    <div class="ui inverted secondary center aligned very padded segment">
                        <div class="ui icon tiny header">
                            <i class="pdf file outline icon"></i>
                            Click the <strong>Add Files</strong> button to upload your documents
                        </div>
                        <input type="file" (change)="fileEvent($event)" onchange="checkUpload(this);" class="inputfile" name="files[]" id="fileimage" multiple/>
                        <label for="fileimage" class="ui basic inverted button">
                            Add Files
                        </label>
                    </div>
                    <input type="hidden" name="_method" value="POST">
                    <input type="hidden" name="course_id" value="{{$course->course_id}}">
                    <input type="hidden" name="school_id" value="{{$school->school_id}}">
                    <button class="ui complete disabled fluid button" type="submit">Complete registration</button>
                </form>
            </div>
        </div>
        <div class="two wide column"></div>
    </div>
</div>
@endsection
@section('js')
    <script>
        function checkUpload(req){
            var files = req.files;
            if(files.length >= 0) {
                var filenum = files.length;
                $('#uploadedfiles').progress({
                    percent: 100
                });
                $('.upload.label').text(filenum + ' files uploaded');
                $('.complete').removeClass('disabled').addClass('blue');
            }
        }
    </script>
@endsection