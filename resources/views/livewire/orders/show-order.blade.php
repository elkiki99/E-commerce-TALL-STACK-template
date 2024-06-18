<div>
    @if (isset($payment))
        <table class="w-full">
            <thead>
                <tr class="bg-gray-100 dark:bg-gray-800">
                    <th class="px-4 py-2 text-left">Image</th>
                    <th class="px-4 py-2 text-left">Product</th>
                    <th class="px-4 py-2 text-left">Price</th>
                    <th class="px-4 py-2 text-left">Quantity</th>
                    <th class="px-4 py-2 text-left">Total</th>
                    <th class="px-4 py-2 text-left"></th>
                </tr>
            </thead>
            <tbody>
                @foreach ($paymentItems as $item)
                    <tr class="border-t border-gray-200 dark:border-gray-600">
                        <td class="px-4 py-2"><img src="{{ asset('storage/img/products/' . $item->product->image ) }}" alt="{{ $item->product->name }}" class="object-contain w-16 h-16 bg-gray-200 dark:bg-gray-300"></td>
                        <td class="px-4 py-2">{{ $item->product->name }}</td>
                        <td class="px-4 py-2">${{ number_format($item->product->price, 2) }}</td>
                        <td class="px-4 py-2">{{ $item->quantity }}</td>
                        <td class="px-4 py-2">${{ number_format($item->product->price * $item->quantity, 2) }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    @endif

    <div class="mx-24 mt-12 text-right">
        <p><strong>Grand total:</strong> ${{ number_format($grandTotal, 2) }}</p>
    </div>
</div>
