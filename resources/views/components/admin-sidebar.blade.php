
<div class="hidden p-4 mb-10 min-w-48 lg:block">
    <ul class="mt-4 space-y-2">
        <li>
            <a wire:navigate href="{{ route('dashboard') }}" class=" block px-4 py-2 text-sm font-medium rounded-md  {{ request()->is('dashboard') ? 'bg-gray-900 text-gray-100 hover:bg-gray-800 dark:bg-gray-100 dark:text-gray-900 dark:hover:bg-gray-300' : 'text-gray-700 bg-gray-100 hover:bg-gray-200 dark:text-gray-300 dark:bg-gray-900 dark:hover:text-gray-900' }}">
                Dashboard
            </a>
        </li>
        <li>
            <a wire:navigate href="{{ route('orders.index') }}" class=" block px-4 py-2 text-sm font-medium rounded-md  {{ request()->is('orders') ? 'bg-gray-900 text-gray-100 hover:bg-gray-800 dark:bg-gray-100 dark:text-gray-900 dark:hover:bg-gray-300' : 'text-gray-700 bg-gray-100 hover:bg-gray-200 dark:text-gray-300 dark:bg-gray-900 dark:hover:text-gray-900' }}">
                Manage orders
            </a>
        </li>
        <li>
            <a wire:navigate href="{{ route('products.create') }}" class=" block px-4 py-2 text-sm font-medium rounded-md {{ request()->is('products/create') ? 'bg-gray-900 text-gray-100 hover:bg-gray-800 dark:bg-gray-100 dark:text-gray-900 dark:hover:bg-gray-300' : 'text-gray-700 bg-gray-100 hover:bg-gray-200 dark:text-gray-300 dark:bg-gray-900 dark:hover:text-gray-900' }}">
                Create new product
            </a>
        </li>
        <li>
            <a wire:navigate href="{{ route('products.index') }}" class=" block px-4 py-2 text-sm font-medium rounded-md {{ request()->is('products') || request()->is('products/edit/*') ? 'bg-gray-900 text-gray-100 hover:bg-gray-800 dark:bg-gray-100 dark:text-gray-900 dark:hover:bg-gray-300' : 'text-gray-700 bg-gray-100 hover:bg-gray-200 dark:text-gray-300 dark:bg-gray-900 dark:hover:text-gray-900' }}">
                Edit products
            </a>
        </li>
        <li>
            <a wire:navigate href="{{ route('categories.create') }}" class=" block px-4 py-2 text-sm font-medium rounded-md {{ request()->is('categories/create') ? 'bg-gray-900 text-gray-100 hover:bg-gray-800 dark:bg-gray-100 dark:text-gray-900 dark:hover:bg-gray-300' : 'text-gray-700 bg-gray-100 hover:bg-gray-200 dark:text-gray-300 dark:bg-gray-900 dark:hover:text-gray-900' }}">
                Create new category
            </a>
        </li>
        <li>
            <a wire:navigate href="{{ route('categories.index') }}" class="block px-4 py-2 text-sm font-medium rounded-md {{ request()->is('categories') || request()->is('categories/edit/*') ? 'bg-gray-900 text-gray-100 hover:bg-gray-800 dark:bg-gray-100 dark:text-gray-900 dark:hover:bg-gray-300' : 'text-gray-700 bg-gray-100 hover:bg-gray-200 dark:text-gray-300 dark:bg-gray-900 dark:hover:text-gray-900' }}">
                Edit categories
            </a>
        </li>
        <li>
            <a wire:navigate href="{{ route('tags.create') }}" class=" block px-4 py-2 text-sm font-medium rounded-md {{ request()->is('tags/create') ? 'bg-gray-900 text-gray-100 hover:bg-gray-800 dark:bg-gray-100 dark:text-gray-900 dark:hover:bg-gray-300' : 'text-gray-700 bg-gray-100 hover:bg-gray-200 dark:text-gray-300 dark:bg-gray-900 dark:hover:text-gray-900' }}">
                Create new tag
            </a>
        </li>
        <li>
            <a wire:navigate href="{{ route('tags.index') }}" class=" block px-4 py-2 text-sm font-medium rounded-md {{ request()->is('tags') || request()->is('tags/edit/*') ? 'bg-gray-900 text-gray-100 hover:bg-gray-800 dark:bg-gray-100 dark:text-gray-900 dark:hover:bg-gray-300' : 'text-gray-700 bg-gray-100 hover:bg-gray-200 dark:text-gray-300 dark:bg-gray-900 dark:hover:text-gray-900' }}">
                Edit tags
            </a>
        </li>
        <li>
            <a wire:navigate href="{{ route('profile') }}" class="block px-4 py-2 text-sm font-medium rounded-md
            {{ request()->is('profile') ? 'bg-gray-900 text-gray-100 hover:bg-gray-800 dark:bg-gray-100 dark:text-gray-900 dark:hover:bg-gray-300' : 'text-gray-700 bg-gray-100 hover:bg-gray-200 dark:text-gray-300 dark:bg-gray-900 dark:hover:text-gray-900' }}">
                Profile
            </a>
        </li>
    </ul>
</div>