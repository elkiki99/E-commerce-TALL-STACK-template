{{-- @include('layouts.app') --}}

<div class="flex flex-wrap justify-between md:m-10">
    @foreach ($products as $product)
        <div class="flex flex-col w-full p-2 mb-4 md:w-1/2 lg:w-1/3">
            <div class="flex-auto overflow-hidden bg-white rounded-lg md:shadow-md">
                <div class="flex flex-col h-full p-6">
                    <a href="{{route('products.show', ['id' => $product->id])}}">
                    <img src="{{ asset('img/products/' . $product->image_name . '.webp') }}" alt="{{ $product->name }}" class="w-full h-auto mb-4 lazyload">
                    </a>
                    <a href="{{route('products.show', ['id' => $product->id])}}">
                        <h2 class="text-2xl font-semibold text-gray-800">{{ $product->name }}</h2>
                    </a>
                    <p class="mt-2 text-3xl font-bold text-lime-500">${{ $product->price }}</p>
                    <livewire:counter />
                    <div class="mt-auto">
                        <x-primary-button class="w-full md:w-auto">Add to cart</x-primary-button>
                    </div>
                </div>
            </div>  
        </div>
    @endforeach

    <div class="justify-end w-full mt-4">
        {{ $products->links() }}
    </div>
</div>