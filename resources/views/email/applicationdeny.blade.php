@component('mail::message')
# EVSIP Application Update

Dear {{$name}},

We regret to inform you that we had to reject your recent application due to the following reasons:
<br><br>
<div style="background-color: #f5f6f6;border-radius: .5rem;padding: 10px;">
{{$reason}}
</div>
<br><br>
You can still be approved if you comply with the reasons stated above and submitting them using the button below. If you think this is a mistake please 
contact us at support@evsip.com
@component('mail::button', ['url' => ''])
Resubmit Requirements
@endcomponent

Thanks,<br>
{{ config('app.name') }} Team
@endcomponent
