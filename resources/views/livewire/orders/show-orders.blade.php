
<div class="flex flex-col justify-between w-full p-10">
    @if (session()->has('message'))
        <div class="p-2 my-2 text-sm text-green-600 dark:text-green-400">
            {{ session('message') }}
        </div>
    @endif
        
    @if (!$payments->isEmpty())
        @foreach ($payments as $index => $order)
            <div class="{{ $index % 2 == 0 ? 'bg-gray-900 text-white' : 'bg-white text-black' }} p-4 m-0.5 rounded ">                    
                <div class="flex justify-between w-full">
                    @if(auth()->user()->admin === 1)
                        <p>{{$order->user_email}}</p>
                        <p>-</p>
                    @endif
                    
                    @if(auth()->user()->admin === 1)
                        <p>${{$order->amount}} {{$order->currency}}</p>
                        <p>-</p>
                        <p>{{$order->created_at}}</p>
                    @else
                        <p>${{$order->amount}}</p>
                        <p>-</p>
                        <p>{{$order->currency}}</p>
                        <p>-</p>
                        <p>{{\Carbon\Carbon::parse($order->created_at)->diffForHumans()}}</p>
                        <p>-</p>
                        <p>{{$order->created_at}}</p>
                    @endif
                    
                    <div class="flex">
                        <button class="mx-1" type="button" wire:click="$dispatch('showAlert', {{$order->id}})">
                            @if(auth()->user()->admin === 1)
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6">
                                <path stroke-linecap="round" stroke-linejoin="round" d="m4.5 12.75 6 6 9-13.5" />
                            </svg>
                            @endif
                        </button>
                        
                        <a wire:navigate href="{{route('orders.show', ['payment' => $order->payment_id])}}">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="mx-1 size-6">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M12 6.75a.75.75 0 1 1 0-1.5.75.75 0 0 1 0 1.5ZM12 12.75a.75.75 0 1 1 0-1.5.75.75 0 0 1 0 1.5ZM12 18.75a.75.75 0 1 1 0-1.5.75.75 0 0 1 0 1.5Z" />
                            </svg>
                        </a>
                    </div>
                </div>
            </div>
        @endforeach
        
        @if (!$payments->isEmpty())
            <div class="justify-end w-full px-5 py-10">
                {{ $payments->links() }}
            </div>
        @endif
    @else
        @if (auth()->user()->admin === 1)
            <p>No active orders</p>
        @else
            <a wire:navigate href="{{ route('home') }}">No orders found!<span class="text-violet-500"> Go shopping!</span></a>
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