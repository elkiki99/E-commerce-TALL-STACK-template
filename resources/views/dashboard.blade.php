<x-app-layout>
    <x-slot name="header">
        <h2 class="text-xl font-semibold leading-tight text-gray-800 dark:text-gray-200">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="flex my-10 bg-gray-100 dark:bg-gray-900">
        <div class="mx-auto max-w-7xl sm:px-6 lg:px-8">
            @if (session()->has('message'))
                <div class="p-2 my-2 text-sm text-green-600 dark:text-green-400">
                    {{ session('message') }}
                </div>
            @endif

            <div class="grid grid-cols-2 gap-6 sm:grid-cols-3 md:grid-cols-4">
                <!-- Sales Summary -->
                <div class="overflow-hidden bg-white rounded-lg shadow-sm">
                    <a href="#" class="block p-6">
                        <span class="text-lg font-semibold text-gray-800 dark:text-gray-200">Total Sales</span>
                        <span class="block mt-2 text-gray-600 dark:text-gray-400">$500,000</span>
                    </a>
                </div>

                <!-- Sales Analysis -->
                <div class="overflow-hidden bg-white rounded-lg shadow-sm">
                    <a href="#" class="block p-6">
                        <span class="text-lg font-semibold text-gray-800 dark:text-gray-200">Top 5 Products</span>
                        <span class="block mt-2 text-gray-600 dark:text-gray-400">See Details</span>
                    </a>
                </div>

                <!-- Inventory and Products -->
                <div class="overflow-hidden bg-white rounded-lg shadow-sm">
                    <a href="#" class="block p-6">
                        <span class="text-lg font-semibold text-gray-800 dark:text-gray-200">Products in Stock</span>
                        <span class="block mt-2 text-gray-600 dark:text-gray-400">980 available</span>
                    </a>
                </div>

                <!-- Order Management -->
                <div class="overflow-hidden bg-white rounded-lg shadow-sm">
                    <a href="#" class="block p-6">
                        <span class="text-lg font-semibold text-gray-800 dark:text-gray-200">Pending Orders</span>
                        <span class="block mt-2 text-gray-600 dark:text-gray-400">3 pending to ship</span>
                    </a>
                </div>

                <!-- Customer Information -->
                <div class="overflow-hidden bg-white rounded-lg shadow-sm">
                    <a href="#" class="block p-6">
                        <span class="text-lg font-semibold text-gray-800 dark:text-gray-200">Registered Customers</span>
                        <span class="block mt-2 text-gray-600 dark:text-gray-400">1,500 customers</span>
                    </a>
                </div>

                <!-- Marketing Metrics -->
                <div class="overflow-hidden bg-white rounded-lg shadow-sm">
                    <a href="#" class="block p-6">
                        <span class="text-lg font-semibold text-gray-800 dark:text-gray-200">Marketing Campaigns</span>
                        <span class="block mt-2 text-gray-600 dark:text-gray-400">View Analysis</span>
                    </a>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>