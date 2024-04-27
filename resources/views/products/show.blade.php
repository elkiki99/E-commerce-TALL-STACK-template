<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>{{$product->name}}</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,600&display=swap" rel="stylesheet" />

        <!-- Styles -->
        @vite(['resources/css/app.css', 'resources/js/app.js'])
    </head>

    <div class="max-w-3xl p-12 mx-auto">
        <div class="overflow-hidden bg-white rounded-lg shadow-md">
            <div class="md:flex">
                <div class="md:w-1/2">
                    <img src="{{ asset('storage/' . $product->image_name) }}" alt="{{ $product->name }}" class="w-full h-auto">
                </div>
                <div class="p-4 md:w-1/2">
                    <h2 class="text-2xl font-semibold text-gray-800">{{ $product->name }}</h2>
                    <p class="mt-2 text-gray-600">${{ $product->price }}</p>
                    <p class="mt-2 text-gray-700">{{ $product->description }}</p>
                    <p class="mt-2 text-gray-700">Stock: {{ $product->stock }}</p>
                </div>
            </div>
        </div>
    </div>
</html>