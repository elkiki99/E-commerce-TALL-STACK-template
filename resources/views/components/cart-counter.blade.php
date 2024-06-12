<tr class="border-t-2">
    <td class="py-2"><img src="{{ asset('storage/img/products/' . $product['product']->image ) }}" alt="{{ $product['product']->name }}" class="w-24 h-24"></td>
    <td class="py-2">{{ $product['product']->name }}</td>
    <td class="py-2">{{ $product['product']->price }}</td>
    <td>
        <div class="flex flex-grow mt-2" x-data="{ quantity: {{ $product['quantity'] }} }">
            <div>
                <button x-on:click="quantity = quantity > 0 ? quantity-1 : quantity">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-8 h-8">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M5 12h14" />
                    </svg>              
                </button>
            </div>
            <div class="w-8 text-xl font-bold text-center">
                <span x-text="quantity"></span>
            </div>
            <div>
                <button x-on:click="quantity++">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-8 h-8">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M12 4.5v15m7.5-7.5h-15" />
                    </svg>    
                </button>
            </div>
            
            <div class="ml-auto">
                <button type="button" x-on:click="$wire.updateCart({{ $product['product']->id }}, quantity)" class="p-2 bg-blue-600 rounded-md md:w-auto">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" class="w-6 h-6 mx-2 text-white">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M15.75 10.5V6a3.75 3.75 0 1 0-7.5 0v4.5m11.356-1.993 1.263 12c.07.665-.45 1.243-1.119 1.243H4.25a1.125 1.125 0 0 1-1.12-1.243l
                        1.264-12A1.125 1.125 0 0 1 5.513 7.5h12.974c.576 0 1.059.435 1.119 1.007ZM8.625 10.5a.375.375 0 1 1-.75 0 .375.375 0 0 1 .75 0Zm7.5 0a.375.375 0 1 1-.75 0 .375.375 0 0 1 .75 0Z" />
                    </svg>
                </button>
            </div>
        </div>
    </td>
    <td class="py-2">{{ $product['product']->price * $product['quantity']  }}</td>
    <td class="py-2"><livewire:cart.delete-cart-product :productId="$product['product']->id" /></td>
</tr>