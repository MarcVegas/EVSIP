<div class="ui tiny period modal">
    <i class="close icon"></i>
    <div class="content">
        <div class="ui inverted blue segment">
            <h3>Enrollment Period</h3>
        </div>
        <div class="ui basic segment">
            <form class="ui form" action="{{route('schoolpage.eperiod')}}" method="POST">
                @csrf

                <div class="field">
                    <label>Start Date</label>
                    <input type="date" name="enrollment_start" id="enrollment_start">
                </div>
                <div class="field">
                    <label>End Date</label>
                    <input type="date" name="enrollment_end" id="enrollment_end">
                </div>
                <input type="hidden" name="user_id" value="{{Auth::user()->user_id}}">
                <input type="hidden" name="_method" value="POST">
                <div class="action">
                    <button type="submit" class="ui blue right floated button"><i class="check icon"></i> Confirm</button>
                </div><br>
            </form>
        </div>
    </div>
</div>