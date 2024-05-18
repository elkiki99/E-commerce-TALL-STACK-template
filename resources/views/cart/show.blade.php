<x-app-layout>
    <x-slot name="header">
        <h2 class="text-xl font-semibold leading-tight text-gray-800 dark:text-gray-200">
            {{ __('My cart') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="mx-auto max-w-7xl sm:px-6 lg:px-8">
            <div class="overflow-hidden bg-white shadow-sm dark:bg-gray-800 sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <h1 class="my-5 text-2xl font-bold text-center">Go to checkout</h1>
                        
                    @forelse ($carts as $cart)
                        @if (!$cart->items->isEmpty())
                            <table class="w-full my-4 border-t-2">
                                <thead>
                                    <tr>
                                        <th class="pt-5 text-start">Image</th>
                                        <th class="pt-5 text-start">Product</th>
                                        <th class="pt-5 text-start">Price</th>
                                        <th class="pt-5 text-start">Quantity</th>
                                        <th class="pt-5 text-start">Total</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($cart->items as $item)
                                        <tr>
                                            <td><img src="{{ $item->product->image }}" alt="{{ $item->product->name }}" class="w-16 h-16"></td>
                                            <td>{{ $item->product->name }}</td>
                                            <td>{{ $item->product->price }}</td>
                                            <td>{{ $item->quantity }}</td>
                                            <td>$ {{ $item->product->price * $item->quantity }}</td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        @endif
                    @empty
                        <a wire:navigate href="{{ route('home') }}">There's no products yet!<span class="text-violet-500"> Go shopping!</span></a>
                    @endforelse
                </div>
            </div>
        </div>
    </div>
</x-app-layout>

