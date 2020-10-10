@if ($courses ?? '')
    <div class="ui stackable three cards">
        @foreach ($courses as $course)
            <div class="ui raised link view card" id="getCourse">
                <input type="hidden" name="course_id" id="course_id" value="{{$course->course_id}}">
                <a href="/home/preview/{{$course->course_id}}">
                    <div class="ui green label floatlabel">{{$course->duration}}</div>
                    <br><br><br>
                    <img class="ui small circular centered image" src="/storage/avatars/{{$course->avatar}}" alt="logo">
                </a>
                <p class="floatdesc">{{$course->course_name}}</p>
            </div>
        @endforeach
    </div>
    {{$courses->links()}}
@else 
    <div class="ui basic center aligned segment">
        <br><br>
        <img src="/storage/interface/certificate.png" class="ui centered small image" alt="no courses">
        <h4>No courses to display yet</h4>
        <p>This could be a server problem. Try again later</p>
    </div>
@endif