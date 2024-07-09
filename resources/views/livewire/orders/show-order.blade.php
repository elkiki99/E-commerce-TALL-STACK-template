<div class="flex flex-col p-10 text-gray-900 dark:text-gray-100">   
    @if (session()->has('message'))
        <div class="p-2 my-2 text-sm text-green-600 dark:text-green-400">
            {{ session('message') }}
        </div>
    @endif 
    
    @if (isset($payment))
        <table class="w-full">
            <thead>
                <tr>
                    <th class="py-2 text-left dark:text-gray-300">Image</th>
                    <th class="hidden px-4 py-2 text-left sm:table-cell dark:text-gray-300">Product</th>
                    <th class="py-2 text-left dark:text-gray-300">Price</th>
                    <th class="py-2 text-left dark:text-gray-300">Quantity</th>
                    <th class="py-2 text-end sm:text-left dark:text-gray-300">Total</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($paymentItems as $item)
                    <tr class="border-t-2 border-gray-200 dark:border-gray-600">
                        <td class="py-2"><img src="{{ asset('storage/img/products/' . $item->product->image ) }}" alt="{{ $item->product->name }}" class="object-contain w-20 h-20 md:h-24 md:w-24"></td>
                        <td class="hidden sm:table-cell">{{ $item->product->name }}</td>
                        <td>${{ number_format($item->product->price, 2) }}</td>
                        <td class="text-center sm:text-start">{{ $item->quantity }}</td>
                        <td class="font-semibold text-end sm:text-left">${{ number_format($item->product->price * $item->quantity, 2) }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    @endif
    
    @if(auth()->user()->admin === 1)
        <div class="mt-5">
            <h3 class="my-2 text-lg font-bold">User information:</h3>
            <p class="font-light">Name: <span class="font-semibold">{{$payment->user->name}}</span></p>
            <p class="font-light">E-mail: <span class="font-semibold">{{$payment->user->email}}</span></p>
            <p class="font-light">Date: <span class="font-semibold">{{$payment->created_at}}</span></p>
            <p class="font-light">Order id: <span class="text-sm font-light break-all">{{$payment->payment_id}}</span></p>
        </div>
    @endif
        
    <div class="mt-5">
        <p class="text-2xl font-bold dark:text-gray-100"><strong class="text-xl dark:text-gray-300">Grand total:</strong> ${{ number_format($grandTotal, 2) }}</p>
    </div>

    @if(auth()->user()->admin === 1)
        <div class="mt-5">
            <button class="text-xl text-green-500" type="button" wire:click="$dispatch('showAlert', {{ $payment->id }})">
                @if(auth()->user()->admin === 1)
                    <x-primary-button 
                        class="flex items-center justify-center w-full mt-5 text-center bg-green-500 rounded-md hover:bg-green-400 active:bg-green-600 md:w-auto focus:bg-green-600 focus:ring-green-500" 
                        type="button"
                        x-on:click.prevent="$dispatch('open-modal', 'complete-order')">Complete order
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="ml-2 size-6">
                            <path stroke-linecap="round" stroke-linejoin="round" d="m4.5 12.75 6 6 9-13.5" />
                        </svg>                      
                    </x-primary-button>

                    <x-modal name="complete-order" :show="$errors->isNotEmpty()" focusable>
                        <form wire:submit="completeOrder" class="p-6">
                
                            <h2 class="text-lg font-medium text-gray-900 dark:text-gray-100">
                                {{ __('Order completed?') }}
                            </h2>
                
                            <p class="mt-1 text-sm text-gray-600 dark:text-gray-400">
                                {{ __('If the order was delivered successfully, complete order!') }}
                            </p>
                
                            <div class="flex justify-end mt-6">
                                <x-secondary-button x-on:click="$dispatch('close')">
                                    {{ __('Cancel') }}
                                </x-secondary-button>
                
                                <x-primary-button class="bg-green-500 rounded-md ms-3 hover:bg-green-400 active:bg-green-600 md:w-auto focus:bg-green-600 focus:ring-green-500">
                                    {{ __('Complete order') }}
                                </x-primary-button>
                            </div>
                        </form>
                    </x-modal>
                @endif
            </button>
        </div>
    @endif
</div>