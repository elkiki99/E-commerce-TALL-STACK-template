<div class="mt-10">
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
        </div>
    @else
        <div>
            <p>There's no products yet!
                <a class="text-violet-500" href="{{ route('home') }}"> Go shopping!</a>
            </p>
        </div>
    @endif
</div>