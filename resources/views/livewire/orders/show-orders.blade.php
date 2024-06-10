
<div class="flex flex-col justify-between w-full p-10">
    @if (!$payments->isEmpty())
        @foreach ($payments as $index => $order)
            <div class="{{ $index % 2 == 0 ? 'bg-gray-900 text-white' : 'bg-white text-black' }} p-4 m-0.5 rounded ">
                <a wire:navigate href="{{route('orders.show', ['payment' => $order->payment_id])}}">
                    
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
                    </div>
                </a>
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