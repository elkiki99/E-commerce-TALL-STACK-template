<div>
    <h1>Order Details</h1>

    @if ($payment)
        <p>Payment ID: {{ $payment->payment_id }}</p>
        <p>User Email: {{ $payment->user_email }}</p>
        <p>Amount: ${{ number_format($payment->amount, 2) }}</p>
        <p>Order Status: {{ $payment->order_status }}</p>
        <!-- Añade más detalles según sea necesario -->
    @else
        <p>Order not found.</p>
    @endif
</div>  