
<x-app-layout>
    <div class="flex max-w-3xl p-12 mx-auto">
        <div class="flex flex-auto overflow-hidden bg-white rounded-lg shadow-md">
            <div class="md:flex">
                <div class="md:w-1/2">
                    <img src="{{ asset('img/products/' . $product->image_name . '.webp') }}" alt="{{ $product->name }}" class="w-full h-full mb-4 lazyload">
                </div>
                <div class="flex flex-col justify-between p-4 md:w-1/2">
                    <div>
                        <h2 class="text-2xl font-semibold text-gray-800">{{ $product->name }}</h2>
                        <p class="mt-2 text-4xl font-bold text-lime-500">${{ $product->price }}</p>
                        <p class="mt-2 text-gray-700">{{ $product->description }}</p>
                        <div class="flex flex-wrap my-2">
                            @foreach ($tags as $tag)
                                <span class="inline-block px-3 py-1 mb-2 mr-2 text-sm font-semibold text-gray-700 bg-gray-200 rounded-full">{{ $tag->tag }}</span>
                            @endforeach
                        </div>
                    </div>
                    <div class="my-2 mt-auto">
                        <livewire:counter />
                        <x-primary-button>Add to cart</x-primary-button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>