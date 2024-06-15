<div class="flex flex-col">
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
            @foreach ($products as $product)
                <tr class="border-t-2" x-data="{ quantity: {{ $product['quantity'] }}, price: {{ $product['product']->price }}, total: {{ $product['product']->price * $product['quantity'] }} }" wire:key="product-{{ $product['product']->id }}">
                    <td class="py-2">
                        <img src="{{ asset('storage/img/products/' . $product['product']->image ) }}" alt="{{ $product['product']->name }}" class="w-24 h-24">
                    </td>
                    <td class="py-2">{{ $product['product']->name }}</td>
                    <td class="py-2">{{ $product['product']->price }}</td>
                    <td>
                        <div class="flex flex-grow mt-2">
                            <div>
                                <button 
                                    x-on:click="quantity = quantity > 1 ? quantity - 1 : quantity; total = (quantity * price).toFixed(2)"
                                    wire:click="update({{ $product['product']->id }}, quantity > 1 ? quantity - 1 : quantity)"
                                >
                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-8 h-8">
                                        <path stroke-linecap="round" stroke-linejoin="round" d="M5 12h14" />
                                    </svg>              
                                </button>
                            </div>
                            <div class="w-16 text-xl font-bold text-center">
                                <span x-text="quantity"></span>
                            </div>
                            <div>
                                <button 
                                    x-on:click="quantity++ ; total = (quantity * price).toFixed(2)"
                                    wire:click="update({{ $product['product']->id }}, quantity + 1)"
                                >
                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-8 h-8">
                                        <path stroke-linecap="round" stroke-linejoin="round" d="M12 6v6m0 0v6m0-6h6m-6 0H6" />
                                    </svg>
                                </button>
                            </div>
                        </div>
                    </td>
                    <td class="py-2">
                        <span class="block w-16 text-xl font-bold text-center" x-text="total"></span>
                    </td>
                    <td>
                        <button
                            wire:click="remove({{ $product['product']->id }})"
                            wire:key="remove-{{ $product['product']->id }}" 
                        >
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                                <path stroke-linecap="round" stroke-linejoin="round" d="m14.74 9-.346 9m-4.788 0L9.26 9m9.968-3.21c.342.052.682.107 1.022.166m-1.022-.165L18.16 19.673a2.25 2.25 0 0 1-2.244 2.077H8.084a2.25 2.25 0 0 1-2.244-2.077L4.772 5.79m14.456 0a48.108 48.108 0 0 0-3.478-.397m-12 .562c.34-.059.68-.114 1.022-.165m0 0a48.11 48.11 0 0 1 3.478-.397m7.5 0v-.916c0-1.18-.91-2.164-2.09-2.201a51.964 51.964 0 0 0-3.32 0c-1.18.037-2.09 1.022-2.09 2.201v.916m7.5 0a48.667 48.667 0 0 0-7.5 0" />
                            </svg>
                        </button>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
    
    <div class="mx-5 mt-5">
        @guest
            <div class="flex items-center justify-between">
                <div class="flex-1">
                    <livewire:cart.clear-cart :productId="$products[0]['product']->id"/>     
                </div>
                <div class="flex-1 my-5 text-right">
                    <a class="text-violet-500" href="{{ route('login') }}">Log in</a>
                    or
                    <a class="text-violet-500" href="{{ route('register') }}">register</a>
                    to complete your purchase
                </div>
            </div>
        @endguest
    
        @auth
            <div class="mx-5 mt-5 sm:flex sm:justify-end">
                <livewire:cart.clear-cart :productId="$products[0]['product']->id"/> 
            
                <div class="flex mx-2 mt-5">
                    <x-primary-button 
                        wire:click="update({{ $product['product']->id }}, quantity)"
                        x-data="{ quantity: {{ $product['quantity'] }}"
                        href="{{ route('payment.show') }}" 
                        wire:navigate
                        class="sm:ml-auto"
                        type="submit"
                    >Go to checkout
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="ml-2 size-6">
                        <path stroke-linecap="round" stroke-linejoin="round" d="m15 15 6-6m0 0-6-6m6 6H9a6 6 0 0 0 0 12h3" />
                      </svg>
                    </x-primary-button>
                </div>
            </div>
        @endauth
    </div>
</div>