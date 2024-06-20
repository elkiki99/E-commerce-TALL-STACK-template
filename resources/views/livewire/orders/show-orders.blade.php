<div class="flex flex-col justify-between w-full md:p-10">
    @if (!$payments->isEmpty())
        @foreach ($payments as $index => $order)
            <div class="p-4 m-0.5 rounded flex w-full {{ $index % 2 == 1 ? 'bg-white text-black dark:bg-gray-800 dark:text-white' : 'bg-gray-800 text-white dark:bg-gray-300 dark:text-gray-900' }}">
                <div class="flex justify-between w-full">
                    @if(auth()->user()->admin === 1)
                        <p>{{ $order->user_email }}</p>
                        <p>-</p>
                        <p>${{ $order->amount }} {{ $order->currency }}</p>
                        <p class="hidden sm:table-cell">-</p>
                        <p class="hidden sm:table-cell">{{ $order->created_at }}</p>
                    @else
                        <p>${{ $order->amount }} {{ $order->currency }}</p>
                        <p>-</p>
                        <p>{{ \Carbon\Carbon::parse($order->created_at)->diffForHumans() }}</p>
                        <p class="hidden sm:table-cell">-</p>
                        <p class="hidden sm:table-cell">{{ $order->created_at }}</p>
                    @endif
                    
                    <div class="flex">
                        <button class="mx-1" type="button" wire:click="$dispatch('showAlert', {{ $order->id }})">
                            @if(auth()->user()->admin === 1)
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="m4.5 12.75 6 6 9-13.5" />
                                </svg>
                            @endif
                        </button>
                        
                        <a wire:navigate href="{{ route('orders.show', ['payment' => $order->payment_id]) }}">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="mx-1 size-6">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M12 6.75a.75.75 0 1 1 0-1.5.75.75 0 0 1 0 1.5ZM12 12.75a.75.75 0 1 1 0-1.5.75.75 0 0 1 0 1.5ZM12 18.75a.75.75 0 1 1 0-1.5.75.75 0 0 1 0 1.5Z" />
                            </svg>
                        </a>
                    </div>
                </div>
            </div>
        @endforeach
        
        <div class="justify-end w-full px-5 py-10">
            {{ $payments->links() }}
        </div>
    @else
        @if (auth()->user()->admin === 1)
            <p class="my-5 dark:text-gray-400">No active orders</p>
        @else
            <a wire:navigate href="{{ route('home') }}" class="my-5 dark:text-gray-400">No orders found!<span class="text-violet-500"> Go shopping!</span></a>
        @endif
    @endif
</div>

@script
    <script> 
        Livewire.on('showAlert', (orderId) => {
            Swal.fire({
                title: 'Order delivered?',
                text: 'Complete the order',
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Yes, complete',
                cancelButtonText: 'Cancel'
            }).then((result) => {
                if (result.isConfirmed) {
                    Swal.fire(
                        'The order has been delivered!',
                        'Delivered succesfully',
                        'success'
                    );
                    window.setTimeout(() => {
                        @this.call('completeOrder', orderId);
                    }, 1500);
                }
            })
        });
    </script>
@endscript