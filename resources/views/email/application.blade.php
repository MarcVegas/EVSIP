@component('mail::message')
# Your application has been approved!

Hi {{$name}},

We are happy to inform you that your application has request has been approved. You can login with the email and password 
you provided during your application. Should you encounter any difficulties logging in, please don't hesitate to contact us at 
support@evsip.com. 
<br><br>
We can't wait to see your school live on our site. Cheers
@component('mail::button', ['url' => '/login'])
Go to EVSIP
@endcomponent

Thanks,<br>
{{ config('app.name') }} Team
@endcomponent
