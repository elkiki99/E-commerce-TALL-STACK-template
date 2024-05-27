<div class="mt-10">
    @if(count($items) > 0)
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
                @foreach ($items as $item)
                    <tr class="border-t-2">
                        <td class="py-2"><img src="{{ $item['product']->image }}" alt="{{ $item['product']->name }}" class="w-16 h-16"></td>
                        <td class="py-2">{{ $item['product']->name }}</td>
                        <td class="py-2">{{ $item['product']->price }}</td>
                        <td class="py-2"><livewire:cart.counter :productId="$item['product']->id" /></td>
                        <td class="py-2">{{ $item['product']->price * $item['quantity']  }}</td>
                        <td class="py-2"><livewire:cart.delete-cart-product :productId="$item['product']->id" /></td>
                    </tr>
                @endforeach
            </tbody>
        </table>
        <table class="mx-20 my-5 ml-auto">
            <thead>
                <tr>
                    <th>Grand total:</th>
                    <td>${{ number_format($grandTotal, 2) }}</td>
                </tr>
            </thead>
        </table>
        <div>
            @if(!empty($items))
                <livewire:cart.update-cart :productId="$items[0]['product']->id" />
            @endif
        </div>
        <div class="flex">
            <x-primary-button wire:navigate href="{{ route('checkout.index') }}" class="mx-20 ml-auto">Checkout</x-primary-button>
        </div>
    @else
        <a wire:navigate href="{{ route('home') }}">There's no products yet!<span class="text-violet-500"> Go shopping!</span></a>
    @endif
</div>