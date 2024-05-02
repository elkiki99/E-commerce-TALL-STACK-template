
<x-app-layout>
    <div>
        <div class="sm:mx-auto sm:w-full sm:max-w-md">
            <h2 class="mt-6 text-3xl font-extrabold leading-9 text-center text-gray-900">
                Create a new product
            </h2>
        </div>

        <div class="mt-8 sm:mx-auto sm:w-full sm:max-w-screen-sm">
            <div class="px-4 py-8 bg-white shadow sm:rounded-lg sm:px-10">
                <form method="POST" novalidate action="{{ route('products.store') }}" enctype="multipart/form-data">
                    @csrf
                    <div>
                        <label for="name" class="block text-sm font-medium leading-5 text-gray-700">
                            Product Name
                        </label>

                        <div class="mt-1 rounded-md shadow-sm">
                            <input id="name" placeholder="Your product name" name="name" type="text" required autofocus class="block w-full px-3 py-2 placeholder-gray-400 transition duration-150 ease-in-out border border-gray-300 rounded-md appearance-none focus:outline-none focus:ring-blue focus:border-blue-300 sm:text-sm sm:leading-5" />

                            <x-input-error :messages="$errors->get('name')" class="mt-2" />
                        </div>
                    </div>

                    <div class="mt-6">
                        <label for="price" class="block text-sm font-medium leading-5 text-gray-700">
                            Price
                        </label>

                        <div class="mt-1 rounded-md shadow-sm">
                            <input id="price" placeholder="Your product price" name="price" type="number" step="0.01" required class="block w-full px-3 py-2 placeholder-gray-400 transition duration-150 ease-in-out border border-gray-300 rounded-md appearance-none focus:outline-none focus:ring-blue focus:border-blue-300 sm:text-sm sm:leading-5" />

                            <x-input-error :messages="$errors->get('price')" class="mt-2" />
                        </div>
                    </div>

                    <div class="mt-6">
                        <label for="description" class="block text-sm font-medium leading-5 text-gray-700">
                            Description
                        </label>

                        <div class="mt-1 rounded-md shadow-sm">
                            <textarea id="description" placeholder="Your product description"  name="description" rows="4" required class="block w-full px-3 py-2 placeholder-gray-400 transition duration-150 ease-in-out border border-gray-300 rounded-md appearance-none focus:outline-none focus:ring-blue focus:border-blue-300 sm:text-sm sm:leading-5"></textarea>

                            <x-input-error :messages="$errors->get('description')" class="mt-2" />
                        </div>
                    </div>

                    <div class="mt-6">
                        <label for="image_name" class="block text-sm font-medium leading-5 text-gray-700">
                            Image
                        </label>

                        <div class="mt-1 rounded-md shadow-sm">
                            <input id="image" name="image" type="file" accept="image/*,image/webp" required class="block w-full px-3 py-2 placeholder-gray-400 transition duration-150 ease-in-out border border-gray-300 rounded-md appearance-none focus:outline-none focus:ring-blue focus:border-blue-300 sm:text-sm sm:leading-5" />

                            <x-input-error :messages="$errors->get('image')" class="mt-2" />
                        </div>
                    </div>

                    <div class="mt-6">
                        <label for="stock" class="block text-sm font-medium leading-5 text-gray-700">
                            Stock
                        </label>

                        <div class="mt-1 rounded-md shadow-sm">
                            <input id="stock" placeholder="Example: 23" name="stock" type="number" required class="block w-full px-3 py-2 placeholder-gray-400 transition duration-150 ease-in-out border border-gray-300 rounded-md appearance-none focus:outline-none focus:ring-blue focus:border-blue-300 sm:text-sm sm:leading-5" />

                            <x-input-error :messages="$errors->get('stock')" class="mt-2" />
                        </div>
                    </div>

                    <div class="mt-6">
                        <label for="category_id" class="block text-sm font-medium leading-5 text-gray-700">
                            Category
                        </label>

                        <div class="mt-1 rounded-md shadow-sm">
                            <select id="category" name="category" required class="block w-full px-3 py-2 placeholder-gray-400 transition duration-150 ease-in-out border border-gray-300 rounded-md appearance-none focus:outline-none focus:ring-blue focus:border-blue-300 sm:text-sm sm:leading-5">
                                <option selected disabled>-- Select Category --</option>
                                @foreach ($categories as $category)
                                    <option for="">{{ $category->category }}</option>
                                @endforeach
                            </select>

                            <x-input-error :messages="$errors->get('category')" class="mt-2" />
                        </div>
                    </div>

                    <div class="mt-6">
                        <label for="tags" class="block text-sm font-medium leading-5 text-gray-700">
                            Tags
                        </label>
                        
                        <div class="mt-1 rounded-md shadow-sm">
                            <select id="tags" name="tags" required class="block w-full px-3 py-2 placeholder-gray-400 transition duration-150 ease-in-out border border-gray-300 rounded-md appearance-none focus:outline-none focus:ring-blue focus:border-blue-300 sm:text-sm sm:leading-5">
                                <option selected disabled>-- Select Tags --</option>
                                @foreach ($tags as $tag)
                                    <option for="">{{ $tag->tag }}</option>
                                @endforeach
                            </select>

                            <x-input-error :messages="$errors->get('tags')" class="mt-2" />
                        </div>
                    </div>

                    <div class="mt-6">
                        <span class="w-full rounded-md shadow-sm">
                            <x-primary-button class="w-full text-center sm:w-auto">Create Product</x-primary-button>
                        </span>
                    </div>
                </form>
            </div>
        </div>
    </div>
</x-app-layout>