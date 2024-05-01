@include('layouts.header')

<div class="relative flex items-center justify-center overflow-hidden h-96">
    <img src="/img/welcome.webp" alt="Welcome" class="absolute inset-0 object-cover object-center w-full h-full">
    <div class="absolute inset-0 flex flex-col items-center justify-center text-center text-white">
        <h1 class="text-4xl font-bold">E-commerce Sports Template</h1>
        <p class="text-lg">Do what inspires you</p>
    </div>
</div>

@include('products.index')
