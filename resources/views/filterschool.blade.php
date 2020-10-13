@if ($schools ?? '')
    <div class="ui stackable three cards">
        @foreach ($schools as $school)
            <div class="ui raised link view card" id="getCourse">
                <input type="hidden" name="course_id" id="course_id" value="{{$school->user_id}}">
                <a href="/page/{{$school->user_id}}">
                    <div class="ui teal label floatlabel">{{$school->type}}</div>
                    <br><br><br>
                    <img class="ui small circular centered image" src="/storage/avatars/{{$school->avatar}}" alt="logo">
                </a>
                <p class="floatdesc">{{$school->school_name}}</p>
            </div>
        @endforeach
    </div>
    {{$schools->links('vendor.pagination.semantic-ui')}}
@else 
<div class="ui basic center aligned segment">
    <br><br>
    <img src="/storage/interface/certificate.png" class="ui centered small image" alt="no courses">
    <h4>No courses to display yet</h4>
    <p>This could be a server problem. Try again later</p>
</div>
@endif