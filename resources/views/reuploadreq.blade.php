@extends('layouts.prompt')

@section('content')
<div class="bg">
    <br><br><br><br>
    <div class="ui basic center aligned segment">
        <i class="cloud upload icon"></i>
        <h1 class="title">Reupload your requirements here</h1>
        <p>Only upload documents outlined in the email from us</p>
        <div class="ui raised padded segment">
            <form action="">
                <input type="file" (change)="fileEvent($event)" form="profile" class="inputfile" name="req" id="fileimage"/>
                <label for="fileimage" class="ui brown button">
                    Upload Files
                </label><br>
                <button class="ui button" type="submit">Submit</button>
            </form>
        </div><br>
        <a class="ui blue button" href="/login">Go Back</a>
    </div> 
</div>
@endsection