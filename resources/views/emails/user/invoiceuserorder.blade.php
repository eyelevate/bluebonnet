@component('mail::message')
# Your Order# is: ###

Thank you for your order.

@component('mail::button', ['url' => ''])
Track Your Order
@endcomponent

Thanks,<br>
{{ config('app.name') }}
@endcomponent
