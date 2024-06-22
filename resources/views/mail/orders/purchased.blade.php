<x-mail::message>
# Order Purchased

<x-mail::panel>
    Congratulations!
</x-mail::panel>

<p>Dear {{ $payment->user->name }},</p>
<p>Thank you for your purchase! Your order has been received and is now being processed. Your order details are as follows:</p>
<ul>
    <li>Order Number: {{ $payment->payment_id }}</li>
    <li>Order Date: {{ $payment->created_at->format('F d, Y') }}</li>
</ul>

<x-mail::table>
| Product       | Quantity    | Price         | Total  |
| ------------- |:-----------|:-------------| ------:|
@foreach($payment->paymentItems as $item)
| {{ $item->product->name }} | {{ $item->quantity }} | ${{ number_format($item->product->price, 2) }} | ${{ number_format($item->product->price * $item->quantity, 2) }} |
@endforeach
</x-mail::table>

<p>Total Amount: ${{ number_format($payment->amount, 2) }}</p>

<p>We will notify you when your order has been shipped.</p>
<p>If you have any questions or concerns, please contact us at ecommercetemplate@support.com.</p>
<p>Thank you for shopping with us!</p>

<x-mail::button :url="$url" color="success">
    View Order
</x-mail::button>

Thanks,<br>
&copy; {{ date('Y') }} {{ config('app.name') }}  All rights reserved.
</x-mail::message>