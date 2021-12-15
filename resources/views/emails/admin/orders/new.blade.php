@component('mail::message')
# New Order Placed

You have received a new order, click the link below to view/manage it in your system.
@component('mail::button', ['url' => route('admin.orders.show', $order->id)])
View Order
@endcomponent

Thanks,<br>
{{ config('app.name') }}
@endcomponent
