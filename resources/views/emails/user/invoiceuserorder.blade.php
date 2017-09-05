@component('mail::message')
Hello {!! $company->name !!},

Thank you for your order. You can view it online.

@component('mail::button', ['url' => ''])
View Your Order
@endcomponent

It will be shipped to {!! $company->street !!}, #{!! $company->suite !!}, {!! $company->city !!} {!! $company->state !!} {!! $company->zipcode !!}, {!! $company->country !!}

@component('mail::button', ['url' => ''])
Track Your Shipment
@endcomponent

# Invoice

@component('mail::table')
| Quantity |Description        |Price      |
|:--------:|:--------------------- |-------:|
| 1 | $Invoice->item($id)->Description          | $500.00 |
| 1 | Gold Ring 01 - Moissanite Super Special         | $10,000.00       |

@endcomponent

@component('mail::table')

|                     |          |          |
| ------------------- |---------:| --------:|
| &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;          |<small>Subtotal</small>           |<small> $10,000.00 </small>|
|           |<small>Sales Tax   </small>       | <small>$825.00 </small>      |
|           |<small>Shipping  </small>         | <small>$75.00 </small>| 
|          |<small>Total       </small>       |<small>$10,900.00  </small>  |

@endcomponent


Thanks,<br>
{{ config('app.name') }}


@endcomponent
