<div class="ui basic modal">
    <div class="ui icon header">
        <i class="user outline icon"></i>
        Confirm Approval
    </div>
    <div class="content">
        <p style="text-align:center">Make sure that the user has submitted all required documents. Click <strong>Confirm</strong> to proceed or <strong>Back</strong> to cancel.</p>
    </div>
    <div class="actions">
        <div class="ui red basic cancel inverted button">
        <i class="remove icon"></i>
        Back
        </div>
        {{-- <a class="ui green ok inverted button" href="dashboard/admin/registrations/{{$profile->user_id}}/edit">
        <i class="checkmark icon"></i>
        Confirm
        </a> --}}
        <a class="ui green ok inverted button" onclick="event.preventDefault();
        document.getElementById('approve-form').submit();"><i class="check icon"></i> Approve</a>
        <form id="approve-form" action="{!! action('StudentRegistrationController@update', $profile->user_id) !!}" method="POST" style="display: none;">
            @csrf
            <input type="hidden" name="course_id" id="course_id" value="{{$profile->course_id}}">
            <input type="hidden" name="school_id" id="school_id" value="{{$profile->school_id}}">
            <input type="hidden" name="_method" value="PUT">
        </form>
    </div>
</div>