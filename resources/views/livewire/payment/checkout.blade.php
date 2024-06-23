<div class="flex flex-col p-10 text-gray-900 dark:text-gray-100">    
    @if(($items))
        <div class="justify-center">
            @foreach ($items as $item)
                <div class="flex border-t-2 border-gray-200 dark:border-gray-600 col-2">
                    <img src="{{ asset('storage/img/products/' . $item['product']->image ) }}" alt="{{ $item['product']->name }}" class="w-32 h-32 m-2 bg-gray-200 dark:bg-gray-300"></img>
                    <div class="mt-2">
                        <p class="text-xl font-bold dark:text-gray-300">{{ $item['product']->name }}</p>
                        <p class="text-3xl">${{ $item['product']->price }}</p>
                        <p class="text-lg font-normal dark:text-gray-400">Quantity: <span class="font-bold">{{ $item['quantity'] }}</span></p>
                        <p class="text-lg font-normal dark:text-gray-300">Total: <span class="font-bold dark:text-gray-100">${{ $item['product']->price * $item['quantity']  }}</span></p>
                    </div>
                </div>
            @endforeach

            <p class="mt-5 text-2xl font-bold" id="paypal-amount">Grand total: ${{ number_format($grandTotal, 2) }}</p>
            
            <livewire:payment.go-pay />
        </div>
    @else
        <a class="my-5 text-gray-500" wire:navigate href="{{ route('home') }}">There's no products yet!<span class="text-violet-500"> Go shopping!</span></a>
    @endif
</div>
