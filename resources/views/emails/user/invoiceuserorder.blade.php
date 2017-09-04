@component('mail::message')
Hello {!! $company->name !!},

# Your Order# is: $Invoice->invoice_number

@component('mail::button', ['url' => ''])
View Your Order
@endcomponent


Thank you for your order.

It will be shipped to {!! $company->street !!}, #{!! $company->suite !!}, {!! $company->city !!} {!! $company->state !!} {!! $company->zipcode !!}, {!! $company->country !!}

@component('mail::button', ['url' => ''])
Track Your Shipment
@endcomponent

# Invoice

@component('mail::table')
| Quantity |Description        |Price      |
|:--------:|:--------------------- |-------:|
| $Invoice->item($id)->Qty | $Invoice->item($id)->Description          | $Invoice->item($id)->Price       |
| 1 | Gold Ring 01 - Moissanite Super Special         | $10,000.00       |

@endcomponent

@component('mail::table')

|                     |          |          |
| ------------------- |---------:| --------:|
|           |<small>Subtotal</small>           |<small> $10,000.00 </small>|
|           |<small>Sales Tax   </small>       | <small>$825.00 </small>      |
|           |<small>Shipping  </small>         | <small>$75.00 </small>| 
|          |<small>Total       </small>       |<small>$10,900.00  </small>  |

@endcomponent



Thanks,<br>
{{ config('app.name') }}
@endcomponent
