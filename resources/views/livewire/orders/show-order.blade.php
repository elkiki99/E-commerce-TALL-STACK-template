<div class="flex flex-col mt-10">    
    @if (isset($payment))
        <table class="w-full">
            <thead>
                <tr>
                    <th class="py-2 text-left dark:text-gray-300">Image</th>
                    <th class="hidden px-4 py-2 text-left sm:table-cell dark:text-gray-300">Product</th>
                    <th class="py-2 text-left dark:text-gray-300">Price</th>
                    <th class="py-2 text-left dark:text-gray-300">Quantity</th>
                    <th class="py-2 text-left dark:text-gray-300">Total</th>
                    <th class="py-2 text-left dark:text-gray-300"></th>
                </tr>
            </thead>
            <tbody>
                @foreach ($paymentItems as $item)
                    <tr class="border-t-2 border-gray-200 dark:border-gray-600">
                        <td class="py-2"><img src="{{ asset('storage/img/products/' . $item->product->image ) }}" alt="{{ $item->product->name }}" class="object-contain w-24 h-24 bg-gray-200 dark:bg-gray-300"></td>
                        <td class="hidden sm:table-cell">{{ $item->product->name }}</td>
                        <td class="">${{ number_format($item->product->price, 2) }}</td>
                        <td class="text-xl font-bold text-center sm:text-start">{{ $item->quantity }}</td>
                        <td class="text-xl font-bold">${{ number_format($item->product->price * $item->quantity, 2) }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    @endif

    <div class="mx-10 ml-auto">
        <p class="text-2xl font-bold dark:text-gray-100"><strong class="text-xl dark:text-gray-400">Grand total:</strong> ${{ number_format($grandTotal, 2) }}</p>
    </div>
</div>
