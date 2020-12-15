@component('mail::message')
# Hi {{$name}},

This is to remind you that your next billing date is on {{$date}}. This does not 
require any further action on your part. You can manage your subscription anytime on the <b>Subscription</b> 
tab. We hope you enjoy using our platform as much as we enjoy having you.


All the best,<br>
{{ config('app.name') }} Team
@endcomponent
