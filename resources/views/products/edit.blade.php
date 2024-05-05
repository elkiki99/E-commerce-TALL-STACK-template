
<x-app-layout>
    <div class="p-10">
        <div class="sm:mx-auto sm:w-full sm:max-w-md">
            <h2 class="mt-6 text-3xl font-extrabold leading-9 text-center text-gray-900">
                Edit product
            </h2>
        </div>

        <div class="mt-8 sm:mx-auto sm:w-full sm:max-w-screen-sm">
            <div class="px-4 py-8 bg-white shadow sm:rounded-lg sm:px-10">
                <form method="POST" novalidate action="{{ route('products.update', $product) }}" enctype="multipart/form-data">
                    @csrf
                    <div>
                        <label for="name" class="block text-sm font-medium leading-5 text-gray-700">
                            Product Name
                        </label>

                        <div class="mt-1 rounded-md shadow-sm">
                            <input value="{{ $product->name }}" id="name" placeholder="Your product name" name="name" type="text" required autofocus class="block w-full px-3 py-2 placeholder-gray-400 transition duration-150 ease-in-out border border-gray-300 rounded-md appearance-none focus:outline-none focus:ring-blue focus:border-blue-300 sm:text-sm sm:leading-5" />

                            <x-input-error :messages="$errors->get('name')" class="mt-2" />
                        </div>
                    </div>

                    <div class="mt-6">
                        <label for="price" class="block text-sm font-medium leading-5 text-gray-700">
                            Price
                        </label>

                        <div class="mt-1 rounded-md shadow-sm">
                            <input  value="{{ $product->price }}"id="price" placeholder="49.99" name="price" type="number" step="0.01" required class="block w-full px-3 py-2 placeholder-gray-400 transition duration-150 ease-in-out border border-gray-300 rounded-md appearance-none focus:outline-none focus:ring-blue focus:border-blue-300 sm:text-sm sm:leading-5" />

                            <x-input-error :messages="$errors->get('price')" class="mt-2" />
                        </div>
                    </div>

                    <div class="mt-6">
                        <label for="description" class="block text-sm font-medium leading-5 text-gray-700">
                            Description
                        </label>

                        <div class="mt-1 rounded-md shadow-sm">
                            <textarea id="description" placeholder="Your product description"  name="description" rows="4" required class="block w-full px-3 py-2 placeholder-gray-400 transition duration-150 ease-in-out border border-gray-300 rounded-md appearance-none focus:outline-none focus:ring-blue focus:border-blue-300 sm:text-sm sm:leading-5">{{ $product->description }}</textarea>

                            <x-input-error :messages="$errors->get('description')" class="mt-2" />
                        </div>
                    </div>

                    <div class="mt-6">
                        <label for="image_name" class="block text-sm font-medium leading-5 text-gray-700">
                            Image
                        </label>

                        <div class="mt-1 rounded-md shadow-sm">
                            <input id="image" name="image" lang="en" type="file" accept="image/*,image/webp" required class="block w-full px-3 py-2 placeholder-gray-400 transition duration-150 ease-in-out border border-gray-300 rounded-md appearance-none focus:outline-none focus:ring-blue focus:border-blue-300 sm:text-sm sm:leading-5" />

                            <x-input-error :messages="$errors->get('image')" class="mt-2" />
                        </div>
                    </div>

                    <div class="w-2/4 mt-6">
                        <img class="rounded" src="{{ asset('storage/img/products/' . $product->image_name ) }}" alt="{{ $product->name }}" class="w-full h-auto mb-4 lazyload">
                    </div>

                    <div class="mt-6">
                        <label for="stock" class="block text-sm font-medium leading-5 text-gray-700">
                            Stock
                        </label>

                        <div class="mt-1 rounded-md shadow-sm">
                            <input  value="{{ $product->stock }}"id="stock" placeholder="Example: 23" name="stock" type="number" required class="block w-full px-3 py-2 placeholder-gray-400 transition duration-150 ease-in-out border border-gray-300 rounded-md appearance-none focus:outline-none focus:ring-blue focus:border-blue-300 sm:text-sm sm:leading-5" />

                            <x-input-error :messages="$errors->get('stock')" class="mt-2" />
                        </div>
                    </div>

                    <div class="mt-6">
                        <label for="category" class="block text-sm font-medium leading-5 text-gray-700">
                            Category
                        </label>

                        <div class="mt-1 rounded-md shadow-sm">
                            <select id="category" name="category" required class="block w-full px-3 py-2 placeholder-gray-400 transition duration-150 ease-in-out border border-gray-300 rounded-md appearance-none focus:outline-none focus:ring-blue focus:border-blue-300 sm:text-sm sm:leading-5">
                                <option selected disabled>-- Select Category --</option>
                                @foreach ($categories as $category)
                                <option value="{{ $category->id }}" {{ $category->id == $product->category_id ? 'selected' : '' }}>{{ $category->category }}</option>
                                @endforeach
                            </select>

                            <x-input-error :messages="$errors->get('category')" class="mt-2" />
                        </div>
                    </div>

                    <div class="mt-6">
                        <label for="tag" class="block text-sm font-medium leading-5 text-gray-700">
                            Tags
                        </label>
                        
                        <div class="mt-6">
                            <label for="tags" class="block text-sm font-medium leading-5 text-gray-700">
                                Tags
                            </label>
                            
                            <div class="mt-1 rounded-md shadow-sm">
                                <select id="tags" name="tags[]" required multiple class="block w-full px-3 py-2 placeholder-gray-400 transition duration-150 ease-in-out border border-gray-300 rounded-md appearance-none focus:outline-none focus:ring-blue focus:border-blue-300 sm:text-sm sm:leading-5">
                                    @foreach ($tags as $tag)
                                        <option value="{{ $tag->id }}" {{ $product->tags->contains($tag->id) ? 'selected' : '' }}>{{ $tag->tag }}</option>
                                    @endforeach
                                </select>
                        
                                <x-input-error :messages="$errors->get('tags')" class="mt-2" />
                            </div>
                        </div>

                    <div class="mt-6">
                        <span class="w-full rounded-md shadow-sm">
                            <x-primary-button class="w-full text-center sm:w-auto">Update product</x-primary-button>
                        </span>
                    </div>
                </form>
            </div>
        </div>
    </div>
</x-app-layout>

<script>
    $(document).ready(function() { 
        $("#tags").select2({
            placeholder: " -- Select Tags --",
            allowClear: true
        }); 
    });
</script>