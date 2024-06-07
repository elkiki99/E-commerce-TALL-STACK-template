
<div class="w-64 min-h-screen bg-white shadow-md dark:bg-gray-800">
    <div class="p-4">
        <ul class="mt-4 space-y-2">
            <li>
                <a wire:navigate href="{{ route('dashboard') }}" class=" block px-4 py-2 text-sm font-medium  rounded-md dark:text-gray-300 dark:bg-gray-700 dark:hover:bg-gray-600 {{ request()->is('dashboard') ? 'bg-gray-900 text-gray-100 hover:bg-gray-800' : 'text-gray-700 bg-gray-100 hover:bg-gray-200' }}">
                    Dashboard
                </a>
            </li>
            <li>
                <a wire:navigate href="{{ route('orders.index') }}" class=" block px-4 py-2 text-sm font-medium  rounded-md dark:text-gray-300 dark:bg-gray-700 dark:hover:bg-gray-600 {{ request()->is('orders') ? 'bg-gray-900 text-gray-100 hover:bg-gray-800' : 'text-gray-700 bg-gray-100 hover:bg-gray-200' }}">
                    View all orders
                </a>
            </li>
            <li>
                <a wire:navigate href="{{ route('products.create') }}" class=" block px-4 py-2 text-sm font-medium  rounded-md dark:text-gray-300 dark:bg-gray-700 dark:hover:bg-gray-600 {{ request()->is('products/create') ? 'bg-gray-900 text-gray-100 hover:bg-gray-800' : 'text-gray-700 bg-gray-100 hover:bg-gray-200' }}">
                    Create new product
                </a>
            </li>
            <li>
                <a wire:navigate href="{{ route('products.index') }}" class=" block px-4 py-2 text-sm font-medium  rounded-md dark:text-gray-300 dark:bg-gray-700 dark:hover:bg-gray-600 {{ request()->is('products') ? 'bg-gray-900 text-gray-100 hover:bg-gray-800' : 'text-gray-700 bg-gray-100 hover:bg-gray-200' }}">
                    View all products
                </a>
            </li>
            <li>
                <a wire:navigate href="{{ route('categories.create') }}" class=" block px-4 py-2 text-sm font-medium  rounded-md dark:text-gray-300 dark:bg-gray-700 dark:hover:bg-gray-600 {{ request()->is('categories/create') ? 'bg-gray-900 text-gray-100 hover:bg-gray-800' : 'text-gray-700 bg-gray-100 hover:bg-gray-200' }}">
                    Create new category
                </a>
            </li>
            <li>
                <a wire:navigate href="{{ route('categories.index') }}" class=" block px-4 py-2 text-sm font-medium  rounded-md dark:text-gray-300 dark:bg-gray-700 dark:hover:bg-gray-600 {{ request()->is('categories') ? 'bg-gray-900 text-gray-100 hover:bg-gray-800' : 'text-gray-700 bg-gray-100 hover:bg-gray-200' }}">
                    View all categories
                </a>
            </li>
            <li>
                <a wire:navigate href="{{ route('tags.create') }}" class=" block px-4 py-2 text-sm font-medium  rounded-md dark:text-gray-300 dark:bg-gray-700 dark:hover:bg-gray-600 {{ request()->is('tags/create') ? 'bg-gray-900 text-gray-100 hover:bg-gray-800' : 'text-gray-700 bg-gray-100 hover:bg-gray-200' }}">
                    Create new tag
                </a>
            </li>
            <li>
                <a wire:navigate href="{{ route('tags.index') }}" class=" block px-4 py-2 text-sm font-medium  rounded-md dark:text-gray-300 dark:bg-gray-700 dark:hover:bg-gray-600 {{ request()->is('tags') ? 'bg-gray-900 text-gray-100 hover:bg-gray-800' : 'text-gray-700 bg-gray-100 hover:bg-gray-200' }}">
                    View all tags
                </a>
            </li>
        </ul>
    </div>
</div>