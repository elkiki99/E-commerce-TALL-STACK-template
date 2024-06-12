<div class="mt-10">
    @if(count($products) > 0)
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
                    <x-cart-counter :product="$product"/>
                @endforeach
            </tbody>
        </table>

        <div class="mt-5 sm:flex">
            <div class="">
                @if(!empty($products))
                    <livewire:cart.update-cart :productId="$products[0]['product']->id" />
                @endif
                
                <livewire:cart.clear-cart :productId="$products[0]['product']->id" />
            </div>
            
            <div class="sm:mx-20 sm:ml-auto">
                <table class="flex mt-10 sm:mt-0">
                    <thead>
                        <tr>
                            <th>Grand total:</th>
                            <td>${{ number_format($grandTotal, 2) }}</td>
                        </tr>
                    </thead>
                </table>
                
                @guest
                    <p class="my-5">
                        <a class="text-violet-500" href="{{ route('login') }}">Log in</a>
                        or
                        <a class="text-violet-500" href="{{ route('register') }}">register</a>
                        to complete your purchase
                    </p>
                @endguest

                @auth
                    <div class="flex mt-5">
                        <x-primary-button wire:navigate href="{{ route('payment.show') }}" class="sm:ml-auto">Checkout</x-primary-button>
                    </div>
                @endauth
            </div>
        </div>
    @else
        <a wire:navigate href="{{ route('home') }}">There's no products yet!<span class="text-violet-500"> Go shopping!</span></a>
    @endif
</div>