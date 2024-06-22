<div class="p-6 bg-white rounded-lg shadow-md content">
    <p class="text-lg font-semibold">Dear {{ $payment->user->name }},</p>
    <p>Thank you for your purchase! Your order has been received and is now being processed. Your order details are as follows:</p>
    <ul class="pl-8 list-disc">
        <li>Order Number: {{ $payment->payment_id }}</li>
        <li>Total Amount: ${{ number_format($payment->amount, 2) }}</li>
        <li>Order Date: {{ $payment->created_at->format('F d, Y') }}</li>
    </ul>
    <p>We will notify you when your order has been shipped.</p>
    <p>If you have any questions or concerns, please contact us at ecommercetemplate@support.com.</p>
    <p>Thank you for shopping with us!</p>
</div>
<div class="p-4 mt-4 text-sm text-center text-gray-500 footer">
    &copy; {{ date('Y') }} E-commerce template. All rights reserved.

{{-- // View order button here
    <a href="{{ route('orders.show', $payment->payment_id) }}" class="inline-block px-4 py-2 mt-4 text-white bg-blue-500 rounded-lg hover:bg-blue-600">View Order</a>

    <x-mail::button :url="$url" color="success">
        View Order
    </x-mail::button> --}}

</div>
