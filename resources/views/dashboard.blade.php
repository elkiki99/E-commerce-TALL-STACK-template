<?php
    use Carbon\Carbon;
    use App\Models\PaymentItem;
    use App\Models\Product;

    if (! Gate::allows('dashboard')) {
            abort(403);
        }

    $startOfMonth = Carbon::now()->startOfMonth();
    $endOfMonth = Carbon::now()->endOfMonth();

    $mostSoldProduct = PaymentItem::whereBetween('created_at', [$startOfMonth, $endOfMonth])
                                ->select('product_id', \DB::raw('count(*) as total'))
                                ->groupBy('product_id')
                                ->orderBy('total', 'desc')
                                ->first();
    $productOfTheMonth = null;
    $productSalesCount = 0;
    if ($mostSoldProduct) {
        $productOfTheMonth = Product::find($mostSoldProduct->product_id);
        $productSalesCount = $mostSoldProduct->total;
    }
?>

<x-app-layout>
    <x-slot name="header">
        <h2 class="text-xl font-semibold leading-tight text-gray-800 dark:text-gray-200">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="w-full pb-10 mx-auto lg:w-10/12 md:px-10">
        <button href="{{route('home')}}" class="flex items-center justify-center p-5 dark:text-gray-500" wire:navigate>
            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="mr-2 size-6">
                <path stroke-linecap="round" stroke-linejoin="round" d="M10.5 19.5 3 12m0 0 7.5-7.5M3 12h18" />
            </svg>
            Go to home
        </button>
        
        <div class="w-full">
            
            @if (session()->has('message'))
            <div class="p-2 my-2 text-sm text-green-600 dark:text-green-400">
                {{ session('message') }}
            </div>
            @endif

            <div class="grid grid-cols-1 gap-6 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-3 xl:grid-cols-4">
                
                <!-- Sales Summary -->
                <div class="block p-6 overflow-hidden bg-white rounded-lg shadow-sm dark:bg-gray-800">
                    {{-- <a href="#" class="block p-6"> --}}
                        <span class="text-lg font-semibold text-gray-800 dark:text-gray-200">Total Sales</span>
                        <span class="block mt-2 text-gray-600 dark:text-gray-400">${{ number_format(App\Models\Payment::sum('amount'), 2) }}</span>
                    {{-- </a> --}}
                </div>
                
                <!-- Product of the Month -->
                <div class="block w-full p-6 overflow-hidden bg-white rounded-lg shadow-sm dark:bg-gray-800">
                    {{-- <a href="#" class="block p-6"> --}}
                        <span class="text-lg font-semibold text-gray-800 dark:text-gray-200">Product of the Month</span>
                        @if($productOfTheMonth)
                        <span class="block mt-2 text-gray-600 dark:text-gray-400">{{ $productOfTheMonth->name }}</span>
                        <span class="block mt-2 text-gray-600 dark:text-gray-400">Sales: {{ $productSalesCount }}</span>
                        @else
                        <span class="block mt-2 text-gray-600 dark:text-gray-400">No sales this month</span>
                        @endif
                    {{-- </a> --}}
                </div>

                <!-- Inventory and Products -->
                <div class="block p-6 overflow-hidden bg-white rounded-lg shadow-sm dark:bg-gray-800">
                    {{-- <a href="#" class="block p-6"> --}}
                        <span class="text-lg font-semibold text-gray-800 dark:text-gray-200">Products in Stock</span>
                        <span class="block mt-2 text-gray-600 dark:text-gray-400">{{ App\Models\Product::where('stock', '>', 0)->count() }}</span>
                    {{-- </a> --}}
                </div>
                
                <div class="block p-6 overflow-hidden bg-white rounded-lg shadow-sm dark:bg-gray-800">
                    <span class="text-lg font-semibold text-gray-800 dark:text-gray-200">Products</span>
                    <div class="flex items-center">
                        <a href="{{ route('products.create')}}" class="flex items-center mt-2 text-gray-600 transition-transform transform dark:text-gray-400 hover:scale-105">
                            Create new product
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="ml-2 size-4">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M17.25 8.25 21 12m0 0-3.75 3.75M21 12H3" />
                            </svg>
                        </a>
                    </div>
                    <div class="flex items-center">
                        <a href="{{ route('products.index')}}" class="flex items-center mt-2 text-gray-600 transition-transform transform dark:text-gray-400 hover:scale-105">
                            Manage products
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="ml-2 size-4">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M17.25 8.25 21 12m0 0-3.75 3.75M21 12H3" />
                            </svg>
                        </a>
                    </div>
                </div>
                
                <div class="block p-6 overflow-hidden bg-white rounded-lg shadow-sm dark:bg-gray-800">
                    <span class="text-lg font-semibold text-gray-800 dark:text-gray-200">Categories</span>
                    <div class="flex items-center">
                        <a href="{{ route('categories.create')}}" class="flex items-center mt-2 text-gray-600 transition-transform transform dark:text-gray-400 hover:scale-105">
                            Create new category
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="ml-2 size-4">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M17.25 8.25 21 12m0 0-3.75 3.75M21 12H3" />
                            </svg>
                        </a>
                    </div>
                    <div class="flex items-center">
                        <a href="{{ route('categories.index')}}" class="flex items-center mt-2 text-gray-600 transition-transform transform dark:text-gray-400 hover:scale-105">
                            Manage categories
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="ml-2 size-4">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M17.25 8.25 21 12m0 0-3.75 3.75M21 12H3" />
                            </svg>
                        </a>
                    </div>
                </div>
                
                <div class="block p-6 overflow-hidden bg-white rounded-lg shadow-sm dark:bg-gray-800">
                    <span class="text-lg font-semibold text-gray-800 dark:text-gray-200">Tags</span>
                    <div class="flex items-center">
                        <a href="{{ route('tags.create')}}" class="flex items-center mt-2 text-gray-600 transition-transform transform dark:text-gray-400 hover:scale-105">
                            Create new tag
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="ml-2 size-4">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M17.25 8.25 21 12m0 0-3.75 3.75M21 12H3" />
                            </svg>
                        </a>
                    </div>
                    <div class="flex items-center">
                        <a href="{{ route('tags.index')}}" class="flex items-center mt-2 text-gray-600 transition-transform transform dark:text-gray-400 hover:scale-105">
                            Manage tags
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="ml-2 size-4">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M17.25 8.25 21 12m0 0-3.75 3.75M21 12H3" />
                            </svg>
                        </a>
                    </div>
                </div>

                <!-- Order Management -->
                <div class="block p-6 overflow-hidden bg-white rounded-lg shadow-sm dark:bg-gray-800">
                    {{-- <a href="{{ route('orders.index') }}" class="block p-6"> --}}
                        <span class="text-lg font-semibold text-gray-800 dark:text-gray-200">Pending orders</span>
                        
                        <div class="flex items-center">
                            <a 
                                href="{{ route('orders.index') }}" 
                                class="flex items-center mt-2 text-gray-600 transition-transform transform dark:text-gray-400 hover:scale-105">
                                {{ App\Models\Payment::where('order_status', '1')->count() }} pending to ship
                                
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="ml-2 size-4">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M17.25 8.25 21 12m0 0-3.75 3.75M21 12H3" />
                                </svg>
                            </a>
                        </div>
                    {{-- </a> --}}
                </div>

                <!-- Customer Information -->
                <div class="block p-6 overflow-hidden bg-white rounded-lg shadow-sm dark:bg-gray-800">
                    {{-- <a href="#" class="block p-6"> --}}
                        <span class="text-lg font-semibold text-gray-800 dark:text-gray-200">Registered Customers</span>
                        <span class="block mt-2 text-gray-600 dark:text-gray-400">{{ App\Models\User::where('admin', 0)->count() }}</span>
                    {{-- </a> --}}
                </div>
            </div>
            
            {{-- <livewire:dashboard.sales-history /> --}}
        </div>
    </div>
</x-app-layout>