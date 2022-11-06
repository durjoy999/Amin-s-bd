@component('mail::message')
# I am Juwel Banik


{{-- @component('mail::table')
| Email      | Oder Price    | Order Id   |
| --------------|:-------------:| --------:|
| {{ $mailData['email']  }} |{{ $mailData['orderStatus']  }}     | {{ $mailData['orderPrice']  }}     |

@endcomponent --}}

{{--

Email {{ $mailData['email']  }}
Order id {{ $mailData['orderPrice']  }}
Order Status {{ $mailData['orderStatus']  }}
Order id {{ $mailData['orderId']  }} --}}

The body of your message.

@component('mail::button', ['url' => ''])
Button Text
@endcomponent

Thanks,<br>
{{ config('app.name') }}
@endcomponent
