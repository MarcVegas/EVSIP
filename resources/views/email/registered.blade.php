@component('mail::message')
# Your application has been approved!

Hello {{$name}},
<br><br>
We are happy to inform you that your application for <b>{{$course}}</b> offered by <b>{{$school}}</b> has been 
approved. Please be reminded that you may have to comply other requirements not handled by EVSIP such as enrollment 
fees, entrance exam, and others. 
<br><br>
An outline may be provided below to show you the next steps required to complete 
your enrollment. You can also visit your dashboard through the link below to view more details.

@component('mail::button', ['url' => '/login'])
My Dashboard
@endcomponent

Thanks,<br>
{{ config('app.name') }}
@endcomponent
