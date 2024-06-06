<div>
    <div class="flex flex-col justify-between w-full p-10">
        @foreach ($payments as $index => $order)
            <div class="{{ $index % 2 == 0 ? 'bg-white text-black' : 'bg-gray-900 text-white' }} p-4 m-0.5 rounded ">
                <a wire:navigate href="{{route('orders.show', ['payment_id' => $order->payment_id])}}">
                    
                    <div class="flex justify-between w-full">
                        <p>${{$order->amount}}</p>
                        <p>-</p>
                        <p>{{$order->currency}}</p>
                        <p>-</p>
                        <p>{{\Carbon\Carbon::parse($order->created_at)->diffForHumans()}}</p>
                        <p>-</p>
                        <p>{{$order->created_at}}</p>
                    </div>
                </a>
            </div>
        @endforeach
    </div>
</div>