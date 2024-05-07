
<x-app-layout>
    <x-slot name="header">
        <h2 class="text-xl font-semibold leading-tight text-gray-800 dark:text-gray-200">
            {{ __('Create new product') }}
        </h2>
    </x-slot>

    <div class="mt-8 sm:mx-auto sm:w-full sm:max-w-screen-sm">
        <div class="px-4 py-8 bg-white shadow sm:rounded-lg sm:px-10">
            <livewire:products.create-product />
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