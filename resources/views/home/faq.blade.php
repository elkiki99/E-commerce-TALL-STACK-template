<x-app-layout>
    <!-- Header Section -->
    <div class="w-full h-auto bg-yellow-500">
        <p class="text-center text-white">Our Frequently Asked Questions</p>
    </div>

    <x-header-carousel />

    <section class="py-12 bg-gray-100">
        <div class="container px-4 mx-auto">
            <div class="mb-8 text-center">
                <h2 class="text-3xl font-bold">Frequently Asked Questions</h2>
                <p class="mt-6 text-gray-700">Find answers to the most common questions below.</p>
            </div>
            
            <div class="p-10 bg-white rounded-lg">
                <div class="lg:flex lg:space-x-16">
                    <!-- First Column -->
                    <div class="lg:w-1/2">
                        <h2 class="mb-10 text-2xl font-semibold">Software related questions</h2>
                        <div class="mb-8">
                            <div class="bg-white rounded-lg ">
                                <div x-data="{ open: false }">
                                    <button @click="open = !open" class="flex justify-between w-full text-xl font-semibold text-left text-gray-800">
                                        <p>What is E-commerce Template?</p>
                                        <svg x-show="!open" class="w-6 h-6 text-gray-800" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" d="m4.5 15.75 7.5-7.5 7.5 7.5" />
                                        </svg>
                                        <svg x-show="open" class="w-6 h-6 text-gray-800" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" d="m19.5 8.25-7.5 7.5-7.5-7.5" />
                                        </svg>
                                    </button>
                                    <span class="text-sm text-gray-500">This template is ideal for new businesses.</span>
                                    <div x-show="open" class="mt-6 text-gray-700" x-transition>
                                        E-commerce Template is a versatile and highly customizable template designed for online stores. It offers a wide range of features to help you create a stunning and functional e-commerce website.
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="mb-8">
                            <div class="bg-white rounded-lg ">
                                <div x-data="{ open: false }">
                                    <button @click="open = !open" class="flex justify-between w-full text-xl font-semibold text-left text-gray-800">
                                        <p>How do I install the E-commerce Template?</p>
                                        <svg x-show="!open" class="w-6 h-6 text-gray-800" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" d="m4.5 15.75 7.5-7.5 7.5 7.5" />
                                        </svg>
                                        <svg x-show="open" class="w-6 h-6 text-gray-800" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" d="m19.5 8.25-7.5 7.5-7.5-7.5" />
                                        </svg>
                                    </button>
                                    <span class="text-sm text-gray-500">Follow the steps in the documentation for a smooth installation.</span>
                                    <div x-show="open" class="mt-6 text-gray-700" x-transition>
                                        To install the E-commerce Template, you need to download the template files and integrate them into your project. Detailed installation instructions are provided in the documentation that comes with the template.
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="mb-8">
                            <div class="bg-white rounded-lg ">
                                <div x-data="{ open: false }">
                                    <button @click="open = !open" class="flex justify-between w-full text-xl font-semibold text-left text-gray-800">
                                        <p>What is E-commerce Template?</p>
                                        <svg x-show="!open" class="w-6 h-6 text-gray-800" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" d="m4.5 15.75 7.5-7.5 7.5 7.5" />
                                        </svg>
                                        <svg x-show="open" class="w-6 h-6 text-gray-800" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" d="m19.5 8.25-7.5 7.5-7.5-7.5" />
                                        </svg>
                                    </button>
                                    <span class="text-sm text-gray-500">This template is ideal for new businesses.</span>
                                    <div x-show="open" class="mt-6 text-gray-700" x-transition>
                                        E-commerce Template is a versatile and highly customizable template designed for online stores. It offers a wide range of features to help you create a stunning and functional e-commerce website.
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="mb-8">
                            <div class="bg-white rounded-lg ">
                                <div x-data="{ open: false }">
                                    <button @click="open = !open" class="flex justify-between w-full text-xl font-semibold text-left text-gray-800">
                                        <p>What is E-commerce Template?</p>
                                        <svg x-show="!open" class="w-6 h-6 text-gray-800" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" d="m4.5 15.75 7.5-7.5 7.5 7.5" />
                                        </svg>
                                        <svg x-show="open" class="w-6 h-6 text-gray-800" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" d="m19.5 8.25-7.5 7.5-7.5-7.5" />
                                        </svg>
                                    </button>
                                    <span class="text-sm text-gray-500">This template is ideal for new businesses.</span>
                                    <div x-show="open" class="mt-6 text-gray-700" x-transition>
                                        E-commerce Template is a versatile and highly customizable template designed for online stores. It offers a wide range of features to help you create a stunning and functional e-commerce website.
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- Second Column -->
                    <div class="lg:w-1/2">
                        <h2 class="mt-16 mb-10 text-2xl font-semibold lg:mt-0">Software related questions</h2>
                        <div class="mb-8">
                            <div class="bg-white rounded-lg ">
                                <div x-data="{ open: false }">
                                    <button @click="open = !open" class="flex justify-between w-full text-xl font-semibold text-left text-gray-800">
                                        <p>Can I customize the E-commerce Template?</p>
                                        <svg x-show="!open" class="w-6 h-6 text-gray-800" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" d="m4.5 15.75 7.5-7.5 7.5 7.5" />
                                        </svg>
                                        <svg x-show="open" class="w-6 h-6 text-gray-800" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" d="m19.5 8.25-7.5 7.5-7.5-7.5" />
                                        </svg>
                                    </button>
                                    <span class="text-sm text-gray-500">Customize the template to match your brand.</span>
                                    <div x-show="open" class="mt-6 text-gray-700" x-transition>
                                        Yes, the E-commerce Template is fully customizable. You can modify the design, add new features, and adapt it to your specific needs. The template is built with flexibility in mind to allow for easy customization.
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="mb-8">
                            <div class="bg-white rounded-lg ">
                                <div x-data="{ open: false }">
                                    <button @click="open = !open" class="flex justify-between w-full text-xl font-semibold text-left text-gray-800">
                                        <p>What is E-commerce Template?</p>
                                        <svg x-show="!open" class="w-6 h-6 text-gray-800" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" d="m4.5 15.75 7.5-7.5 7.5 7.5" />
                                        </svg>
                                        <svg x-show="open" class="w-6 h-6 text-gray-800" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" d="m19.5 8.25-7.5 7.5-7.5-7.5" />
                                        </svg>
                                    </button>
                                    <span class="text-sm text-gray-500">This template is ideal for new businesses.</span>
                                    <div x-show="open" class="mt-6 text-gray-700" x-transition>
                                        E-commerce Template is a versatile and highly customizable template designed for online stores. It offers a wide range of features to help you create a stunning and functional e-commerce website.
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="mb-8">
                            <div class="bg-white rounded-lg ">
                                <div x-data="{ open: false }">
                                    <button @click="open = !open" class="flex justify-between w-full text-xl font-semibold text-left text-gray-800">
                                        <p>What is E-commerce Template?</p>
                                        <svg x-show="!open" class="w-6 h-6 text-gray-800" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" d="m4.5 15.75 7.5-7.5 7.5 7.5" />
                                        </svg>
                                        <svg x-show="open" class="w-6 h-6 text-gray-800" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" d="m19.5 8.25-7.5 7.5-7.5-7.5" />
                                        </svg>
                                    </button>
                                    <span class="text-sm text-gray-500">This template is ideal for new businesses.</span>
                                    <div x-show="open" class="mt-6 text-gray-700" x-transition>
                                        E-commerce Template is a versatile and highly customizable template designed for online stores. It offers a wide range of features to help you create a stunning and functional e-commerce website.
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="mb-8">
                            <div class="bg-white rounded-lg ">
                                <div x-data="{ open: false }">
                                    <button @click="open = !open" class="flex justify-between w-full text-xl font-semibold text-left text-gray-800">
                                        <p>How do I get support for the template?</p>
                                        <svg x-show="!open" class="w-6 h-6 text-gray-800" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" d="m4.5 15.75 7.5-7.5 7.5 7.5" />
                                        </svg>
                                        <svg x-show="open" class="w-6 h-6 text-gray-800" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" d="m19.5 8.25-7.5 7.5-7.5-7.5" />
                                        </svg>
                                    </button>
                                    <span class="text-sm text-gray-500">Join the support forum for additional help.</span>
                                    <div x-show="open" class="mt-6 text-gray-700" x-transition>
                                        Support for the template is provided through the documentation and the support forum. If you have any issues, you can refer to these resources for assistance.
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</x-app-layout>