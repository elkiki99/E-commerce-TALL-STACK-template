<x-app-layout>
    <!-- Header Section -->
    <div class="w-full h-auto bg-yellow-500">
        <p class="text-center text-white">Our Frequently Asked Questions</p>
    </div>

    <x-header-carousel />

    <!-- FAQ Section -->
    <section class="py-12 bg-gray-100">
        <div class="container px-4 mx-auto">
            <div class="mb-8 text-center">
                <h2 class="text-3xl font-bold">Frequently Asked Questions</h2>
                <p class="mt-4 text-gray-700">Find answers to the most common questions below.</p>
            </div>
            <div class="flex flex-wrap -mx-4">
                <!-- FAQ Item 1 -->
                <div class="w-full px-4 mb-8">
                    <div class="p-4 bg-white rounded-lg shadow-lg">
                        <div x-data="{ open: false }">
                            <button @click="open = !open" class="flex justify-between w-full text-xl font-semibold text-left text-gray-800">
                                What is E-commerce Template?
                                <svg x-show="!open" class="w-6 h-6 text-gray-800" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 11l7-7 7 7M5 19l7-7 7 7"></path>
                                </svg>
                                <svg x-show="open" class="w-6 h-6 text-gray-800" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 13l-7 7-7-7M19 5l-7 7-7-7"></path>
                                </svg>
                            </button>
                            <div x-show="open" class="mt-4 text-gray-700" x-transition>
                                E-commerce Template is a versatile and highly customizable template designed for online stores. It offers a wide range of features to help you create a stunning and functional e-commerce website.
                            </div>
                        </div>
                    </div>
                </div>
                <!-- FAQ Item 2 -->
                <div class="w-full px-4 mb-8">
                    <div class="p-4 bg-white rounded-lg shadow-lg">
                        <div x-data="{ open: false }">
                            <button @click="open = !open" class="flex justify-between w-full text-xl font-semibold text-left text-gray-800">
                                How do I install the E-commerce Template?
                                <svg x-show="!open" class="w-6 h-6 text-gray-800" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 11l7-7 7 7M5 19l7-7 7 7"></path>
                                </svg>
                                <svg x-show="open" class="w-6 h-6 text-gray-800" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 13l-7 7-7-7M19 5l-7 7-7-7"></path>
                                </svg>
                            </button>
                            <div x-show="open" class="mt-4 text-gray-700" x-transition>
                                To install the E-commerce Template, you need to download the template files and integrate them into your project. Detailed installation instructions are provided in the documentation that comes with the template.
                            </div>
                        </div>
                    </div>
                </div>
                <!-- FAQ Item 3 -->
                <div class="w-full px-4 mb-8">
                    <div class="p-4 bg-white rounded-lg shadow-lg">
                        <div x-data="{ open: false }">
                            <button @click="open = !open" class="flex justify-between w-full text-xl font-semibold text-left text-gray-800">
                                Can I customize the E-commerce Template?
                                <svg x-show="!open" class="w-6 h-6 text-gray-800" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 11l7-7 7 7M5 19l7-7 7 7"></path>
                                </svg>
                                <svg x-show="open" class="w-6 h-6 text-gray-800" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 13l-7 7-7-7M19 5l-7 7-7-7"></path>
                                </svg>
                            </button>
                            <div x-show="open" class="mt-4 text-gray-700" x-transition>
                                Yes, the E-commerce Template is fully customizable. You can modify the design, add new features, and adapt it to your specific needs. The template is built with flexibility in mind to allow for easy customization.
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Add more FAQ items as needed -->
            </div>
        </div>
    </section>
</x-app-layout>