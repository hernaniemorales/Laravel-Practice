@component('mail::message')

# Thank you for your message.

{{-- get the $data from the Model named as ContactFormMail --}}
<strong>Name</strong> {{ $data['name'] }}
<br>
<strong>Email</strong> {{ $data['email'] }}

<strong>Message</strong>

{{ $data['message'] }}

@endcomponent
