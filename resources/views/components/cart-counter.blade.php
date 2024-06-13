<div>
    @foreach ($products as $product)
        <div x-data="{ visible: true }" x-show="visible">
            <tr class="border-t-2" x-data="{ quantity: {{ $product['quantity'] }}, price: {{ $product['product']->price }}, total: {{ $product['product']->price * $product['quantity'] }} }">
                <td class="py-2">
                    <img src="{{ asset('storage/img/products/' . $product['product']->image ) }}" alt="{{ $product['product']->name }}" class="w-24 h-24">
                </td>
                <td class="py-2">{{ $product['product']->name }}</td>
                <td class="py-2">{{ $product['product']->price }}</td>
                
                <td>
                    <div class="flex flex-grow mt-2">
                        <div>
                            <button 
                                x-on:click="quantity = quantity > 0 ? quantity - 1 : quantity; total = quantity * price">
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
                                x-on:click="quantity++; total = quantity * price">
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-8 h-8">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M12 4.5v15m7.5-7.5h-15" />
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
                        x-on:click="visible = false; $wire.remove({{ $product['product']->id }})"
                        wire:click="$refresh"
                        wire:key='{{ $product['product']->id }}' 
                        class="relative"
                        >
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                            <path stroke-linecap="round" stroke-linejoin="round" d="m14.74 9-.346 9m-4.788 0L9.26 9m9.968-3.21c.342.052.682.107 1.022.166m-1.022-.165L18.16 19.673a2.25 2.25 0 0 1-2.244 2.077H8.084a2.25 2.25 0 0 1-2.244-2.077L4.772 5.79m14.456 0a48.108 48.108 0 0 0-3.478-.397m-12 .562c.34-.059.68-.114 1.022-.165m0 0a48.11 48.11 0 0 1 3.478-.397m7.5 0v-.916c0-1.18-.91-2.164-2.09-2.201a51.964 51.964 0 0 0-3.32 0c-1.18.037-2.09 1.022-2.09 2.201v.916m7.5 0a48.667 48.667 0 0 0-7.5 0" />
                        </svg>
                        <span wire:loading wire:target="remove({{ $product['product']->id }})" class="absolute inset-0 flex items-center justify-center bg-gray-100 bg-opacity-50">
                            <svg class="w-6 h-6 animate-spin" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 2v2m0 16v2m8-10h-2m-16 0H2m3.86-7.14L5 7m14-2.14l1.14 1.14m-14 14l1.14-1.14M18.14 5L17 6.14" />
                            </svg>
                        </span>
                    </button>
                </td>
            </tr>
        </div>
    @endforeach
</div>