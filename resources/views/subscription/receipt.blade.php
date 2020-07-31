@extends('layouts.app')

@section('content')
<div class="ui basic compressed segment">
    <div class="ui basic very padded segment">
        <div class="ui stackable padded grid">
            <div class="white row">
                <div class="three wide column"></div>
                <div class="ten wide column">
                    <div class="ui basic center aligned padded segment">
                        <img class="ui small centered image" src="/storage/interface/logotextdark.png" alt="">
                        <h2>Just one more step</h2>
                        <p>Click the button below to submit a photo of your receipt</p>
                        <form action="" enctype="multipart/form-data">
                            <input type="file" (change)="fileEvent($event)" class="inputfile" name="receipt" id="fileimage"/>
                            <label for="fileimage" class="ui primary button">
                                <i class="cloud upload icon"></i>
                                Submit Receipt
                            </label>
                        </form>
                        <br>
                        <div class="ui secondary segment">
                            You don't have to submit a receipt right away. You can come back to this page under
                            <strong>Dashboard > subscription > upload receipt</strong>
                        </div>
                        <a class="ui button" href="/dashboard/admin">Go to Dashboard</a>
                    </div>
                </div>
                <div class="three wide column"></div>
            </div>
        </div>
    </div>
</div>
@endsection