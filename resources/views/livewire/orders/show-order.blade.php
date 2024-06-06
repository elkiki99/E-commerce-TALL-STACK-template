<div>
    @if (isset($payment))
        <table class="w-full">
            <thead>
                <tr>
                    <th class="py-2 text-left">Image</th>
                    <th class="py-2 text-left">Product</th>
                    <th class="py-2 text-left">Price</th>
                    <th class="py-2 text-left">Quantity</th>
                    <th class="py-2 text-left">Total</th>
                    <th class="py-2 text-left"></th>
                </tr>
            </thead>
            <tbody>
                @foreach ($paymentItems as $item)
                    <tr class="border-t-2">
                        <td class="py-2"><img src="{{ $item->product->image }}" alt="{{ $item->product->name }}" class="w-16 h-16"></td>
                        <td class="py-2">{{ $item->product->name }}</td>
                        <td class="py-2">{{ $item->product->price }}</td>
                        <td class="py-2">{{ $item->quantity }}</td>
                        <td class="py-2">{{ $item->product->price * $item->quantity }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    @endif

    <div class="mx-24 mt-12 text-right sm:mt-0">
        <p><strong>Grand total:</strong> ${{ number_format($grandTotal, 2) }}</p>
    </div>
</div>
