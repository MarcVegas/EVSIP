<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    @if (!empty($registrants))
        @foreach ($registrants as $registrant)
            <h4>{{$registrant->school_id}}</h4>
        @endforeach
    @else 
        <h4>Empty</h4>
    @endif
</body>
</html>