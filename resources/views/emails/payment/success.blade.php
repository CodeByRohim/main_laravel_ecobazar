{{-- <x-mail::message>
# Introduction

The body of your message.

<x-mail::button :url="''">
Button Text
</x-mail::button>

Thanks,<br>
{{ config('app.name') }}
</x-mail::message> --}}
@component('mail::message')
@component('mail::message')
# Payment Successful

Hello {{ $data['name'] }},

We have successfully received your payment of **${{ $data['amount'] }}**.

Your transaction ID is:

@component('mail::panel')
{{ $data['txn_id'] }}
@endcomponent

If you have any questions or need support, feel free to reply to this email.

@component('mail::button', ['url' => config('app.url')])
Visit Our Website
@endcomponent

Thanks,<br>
{{ config('app.name') }}
@endcomponent

{{ config('app.name') }}
@endcomponent
