@if (count($courses) > 0)
    <div class="ui stackable four cards">
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
@endif