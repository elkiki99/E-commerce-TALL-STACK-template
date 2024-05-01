@section('content')
<div>
    <div class="sm:mx-auto sm:w-full sm:max-w-md">
        <h2 class="mt-6 text-3xl font-extrabold leading-9 text-center text-gray-900">
            Create a new product
        </h2>
    </div>

    <div class="mt-8 sm:mx-auto sm:w-full sm:max-w-md">
        <div class="px-4 py-8 bg-white shadow sm:rounded-lg sm:px-10">
            <form method="POST" action="{{ route('products.store') }}" enctype="multipart/form-data">
                @csrf

                <div>
                    <label for="name" class="block text-sm font-medium leading-5 text-gray-700">
                        Product Name
                    </label>

                    <div class="mt-1 rounded-md shadow-sm">
                        <input id="name" name="name" type="text" required autofocus class="block w-full px-3 py-2 placeholder-gray-400 transition duration-150 ease-in-out border border-gray-300 rounded-md appearance-none focus:outline-none focus:ring-blue focus:border-blue-300 sm:text-sm sm:leading-5" />
                    </div>
                </div>

                <div class="mt-6">
                    <label for="price" class="block text-sm font-medium leading-5 text-gray-700">
                        Price
                    </label>

                    <div class="mt-1 rounded-md shadow-sm">
                        <input id="price" name="price" type="number" step="0.01" required class="block w-full px-3 py-2 placeholder-gray-400 transition duration-150 ease-in-out border border-gray-300 rounded-md appearance-none focus:outline-none focus:ring-blue focus:border-blue-300 sm:text-sm sm:leading-5" />
                    </div>
                </div>

                <div class="mt-6">
                    <label for="description" class="block text-sm font-medium leading-5 text-gray-700">
                        Description
                    </label>

                    <div class="mt-1 rounded-md shadow-sm">
                        <textarea id="description" name="description" rows="4" required class="block w-full px-3 py-2 placeholder-gray-400 transition duration-150 ease-in-out border border-gray-300 rounded-md appearance-none focus:outline-none focus:ring-blue focus:border-blue-300 sm:text-sm sm:leading-5"></textarea>
                    </div>
                </div>

                <div class="mt-6">
                    <label for="image_name" class="block text-sm font-medium leading-5 text-gray-700">
                        Image
                    </label>

                    <div class="mt-1 rounded-md shadow-sm">
                        <input id="image_name" name="image_name" type="file" accept="image/*" required class="block w-full px-3 py-2 placeholder-gray-400 transition duration-150 ease-in-out border border-gray-300 rounded-md appearance-none focus:outline-none focus:ring-blue focus:border-blue-300 sm:text-sm sm:leading-5" />
                    </div>
                </div>

                <div class="mt-6">
                    <label for="stock" class="block text-sm font-medium leading-5 text-gray-700">
                        Stock
                    </label>

                    <div class="mt-1 rounded-md shadow-sm">
                        <input id="stock" name="stock" type="number" required class="block w-full px-3 py-2 placeholder-gray-400 transition duration-150 ease-in-out border border-gray-300 rounded-md appearance-none focus:outline-none focus:ring-blue focus:border-blue-300 sm:text-sm sm:leading-5" />
                    </div>
                </div>

                <div class="mt-6">
                    <label for="category_id" class="block text-sm font-medium leading-5 text-gray-700">
                        Category
                    </label>

                    <div class="mt-1 rounded-md shadow-sm">
                        <select id="category_id" name="category_id" required class="block w-full px-3 py-2 placeholder-gray-400 transition duration-150 ease-in-out border border-gray-300 rounded-md appearance-none focus:outline-none focus:ring-blue focus:border-blue-300 sm:text-sm sm:leading-5">
                            <option value="">Select Category</option>
                            {{-- You can populate categories dynamically from your database --}}
                        </select>
                    </div>
                </div>

                <div class="mt-6">
                    <span class="block w-full rounded-md shadow-sm">
                        <button type="submit" class="flex justify-center w-full px-4 py-2 text-sm font-medium text-white transition duration-150 ease-in-out bg-indigo-600 border border-transparent rounded-md hover:bg-indigo-500 focus:outline-none focus:border-indigo-700 focus:ring-indigo active:bg-indigo-700">
                            Create Product
                        </button>
                    </span>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection