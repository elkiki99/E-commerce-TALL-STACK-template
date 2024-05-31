<div class="mt-10">
    <div class="col-12 col-lg-6 offset-lg-3 alert alert-success" role="alert" id="paypal-success" style="display: none;">
        You have successfully completed your purchase!
    </div>
    
    @if(($items))
        <div class="justify-center">
            @foreach ($items as $item)
                <div class="flex border-t-2 col-2">
                    <img src="{{ $item['product']->image }}" alt="{{ $item['product']->name }}" class="w-32 h-32 m-2"></img>
                    <div class="mt-2">
                        <p class="text-xl font-bold">{{ $item['product']->name }}</p>
                        <p class="text-3xl">${{ $item['product']->price }}</p>
                        <p class="text-lg font-normal">Quantity: <span class="font-bold">{{ $item['quantity'] }}</span></p>
                        <p class="text-lg font-normal">Total: <span class="font-bold">{{ $item['product']->price * $item['quantity']  }}</span></p>
                    </div>
                </div>
            @endforeach

            <h2 class="mt-5 text-xl font-bold">Grand total:</h2>
            <p class="text-2xl" id="paypal-amount">${{ number_format($grandTotal, 2) }}</p>
    
            <div class="flex mt-5">
                <form action="/checkout" method="POST">
                    <input type="hidden" name="_token" value="{{csrf_token()}}">
                    <button type="submit">Checkout</button>
                </form>
            </div>
        </div>
    @else
        <div>
            <p>There's no products yet!
                <a class="text-violet-500" href="{{ route('home') }}"> Go shopping!</a>
            </p>
        </div>
    @endif
</div>
