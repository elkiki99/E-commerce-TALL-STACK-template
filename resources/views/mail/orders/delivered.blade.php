<x-mail::message>
# Order Delivered

<x-mail::panel>
    Delivered!
</x-mail::panel>

<p>Dear {{ $payment->user->name }},</p>
<p>Your order has been delivered. Your order details are as follows:</p>
<ul>
    <li>Order Number: {{ $payment->payment_id }}</li>
    <li>Order Date: {{ $payment->created_at->format('F d, Y') }}</li>
</ul>

<x-mail::table>
| Product       | Quantity    | Price         | Total  |
| :------------ |:-----------|:---------------| ------:|
@foreach($payment->paymentItems as $item)
| {{ $item->product->name }} | {{ $item->quantity }} | ${{ number_format($item->product->price, 2) }} | ${{ number_format($item->product->price * $item->quantity, 2) }} |
@endforeach
</x-mail::table>

<p>Total Amount: ${{ number_format($payment->amount, 2) }}</p>

<p>If you have any questions or concerns, please contact us at ecommercetemplate@support.com.</p>
<p>Thank you for shopping with us!</p>

</x-mail::message>