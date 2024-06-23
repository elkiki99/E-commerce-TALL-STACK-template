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

    <div class="w-full pb-10 mx-auto mt-16 lg:w-10/12 md:px-10">
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

                <!-- Order Management -->
                <div class="overflow-hidden bg-white rounded-lg shadow-sm dark:bg-gray-800 ">
                    <a href="{{ route('orders.index') }}" class="block p-6">
                        <span class="text-lg font-semibold text-gray-800 dark:text-gray-200">Pending Orders</span>
                        <span class="block mt-2 text-gray-600 dark:text-gray-400">{{ App\Models\Payment::all()->count() }} pending to ship</span>
                    </a>
                </div>

                <!-- Customer Information -->
                <div class="block p-6 overflow-hidden bg-white rounded-lg shadow-sm dark:bg-gray-800">
                    {{-- <a href="#" class="block p-6"> --}}
                        <span class="text-lg font-semibold text-gray-800 dark:text-gray-200">Registered Customers</span>
                        <span class="block mt-2 text-gray-600 dark:text-gray-400">{{ App\Models\User::where('admin', 0)->count() }}</span>
                    {{-- </a> --}}
                </div>

                <!-- Marketing Metrics -->
                <div class="overflow-hidden bg-white rounded-lg shadow-sm dark:bg-gray-800">
                    <a href="#" class="block p-6">
                        <span class="text-lg font-semibold text-gray-800 dark:text-gray-200">Marketing Campaigns</span>
                        <span class="block mt-2 text-gray-600 dark:text-gray-400">View Analysis</span>
                    </a>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>