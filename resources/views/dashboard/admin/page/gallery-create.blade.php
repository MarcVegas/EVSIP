@extends('layouts.dashboard')

@section('content')
@include('inc.sidemenu')
<div class="thirteen wide column" style="padding: 0 !important;">
    @include('inc.navbar-admin')
    <div class="pale" style="margin-top: 1em; height: 41em;">
        @include('inc.messages')
        <div class="ui basic segment">
            <div class="ui secondary menu">
                <div class="item">
                    <a href="/pagemanagement" class="ui button" ><i class="angle left icon"></i> Back</a>
                </div>
                <div class="right menu">
                    <div class="item">
                        <a class="ui inverted purple button" target="_blank" rel="noopener noreferrer" href="/page/{{Auth::user()->user_id}}"><i class="external alternate icon"></i> Visit Page</a>
                    </div>
                </div>
            </div>
            <div class="ui stackable grid">
                <div class="eleven wide column">
                    <div class="ui placeholder center aligned segment">
                        <form action="{{route('galleries.store')}}" method="POST" enctype="multipart/form-data">
                            @csrf

                            <h3>Click button to upload photos</h3>
                            <input type="file" (change)="fileEvent($event)" onchange="checkUpload(this);" class="inputfile" name="files[]" id="fileimage" multiple/>
                            <label for="fileimage" class="ui basic teal button">
                            <i class="clound upload icon"></i> Upload File
                            </label>
                            <div class="ui blue inverted progress" data-percent="0" id="uploadedfiles">
                                <div class="bar"></div>
                                <div class="upload label">0 files uploaded</div>
                            </div>
                            <input type="hidden" name="user_id" value="{{Auth::user()->user_id}}">
                            <input type="hidden" name="_method" value="POST">
                            <button type="submit" class="ui inverted confirmphotos disabled button">Finish upload</button>
                        </form>
                    </div>
                </div>
                <div class="five wide column">
                    <br><br>
                    <div class="ui center aligned segment">
                        <div class="ui small icon header">
                            <i class="images outline icon"></i><br>
                            Your photos will be visible on your personal page.
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
@section('ajax')
    <script>
        function checkUpload(req){
            var files = req.files;
            if(files.length >= 0) {
                var filenum = files.length;
                $('#uploadedfiles').progress({
                    percent: 100
                });
                $('.upload.label').text(filenum + ' files uploaded');
                $('.confirmphotos').removeClass('disabled inverted').addClass('blue');
            }
        }
    </script>
@endsection