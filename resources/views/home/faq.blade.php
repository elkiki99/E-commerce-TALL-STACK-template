<x-app-layout>
    <!-- Header Section -->
    <div class="w-full h-auto bg-yellow-500">
        <p class="text-center text-white">Our Frequently Asked Questions</p>
    </div>

    <x-header-carousel />

    <section class="py-12 bg-gray-100 dark:bg-gray-900">
        <div class="container px-4 mx-auto">
            <div class="mb-8 text-center">
                <h2 class="text-3xl font-bold dark:text-gray-100">Frequently Asked Questions</h2>
                <p class="mt-6 text-gray-700 dark:text-gray-400">Find answers to the most common questions below.</p>
            </div>
            
            <div class="p-10 bg-white rounded-lg dark:bg-gray-800">
                <div class="lg:flex lg:space-x-16">
                    <div class="lg:w-1/2">
                        <h2 class="mb-10 text-2xl font-semibold dark:text-gray-100">Software related questions</h2>
                        <div class="mb-8">
                            <div class="bg-white rounded-lg dark:bg-gray-800">
                                <div x-data="{ open: false }">
                                    <button @click="open = !open" class="flex justify-between w-full text-xl font-semibold text-left text-gray-800">
                                        <p class="dark:text-gray-300">What is E-commerce Template?</p>
                                            <svg x-show="!open" class="w-6 h-6 text-gray-800 dark:text-gray-300" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
                                                <path stroke-linecap="round" stroke-linejoin="round" d="m4.5 15.75 7.5-7.5 7.5 7.5" />
                                            </svg>
                                            <svg x-show="open" class="w-6 h-6 text-gray-800 dark:text-gray-300" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" d="m19.5 8.25-7.5 7.5-7.5-7.5" />
                                        </svg>
                                    </button>
                                    <span class="text-sm text-gray-500 dark:text-gray-400">This template is ideal for new businesses.</span>
                                    <div x-show="open" class="mt-6 text-gray-700 dark:text-gray-200" x-transition>
                                        E-commerce Template is a versatile and simple customizable template designed for online stores. It offers a wide range of features to help you create functional e-commerce websites.
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="mb-8">
                            <div class="bg-white rounded-lg dark:bg-gray-800">
                                <div x-data="{ open: false }">
                                    <button @click="open = !open" class="flex justify-between w-full text-xl font-semibold text-left text-gray-800">
                                        <p class="dark:text-gray-300">How do I use the E-commerce Template?</p>
                                        <svg x-show="!open" class="w-6 h-6 text-gray-800 dark:text-gray-300" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" d="m4.5 15.75 7.5-7.5 7.5 7.5" />
                                        </svg>
                                        <svg x-show="open" class="w-6 h-6 text-gray-800 dark:text-gray-300" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" d="m19.5 8.25-7.5 7.5-7.5-7.5" />
                                        </svg>
                                    </button>
                                    <span class="text-sm text-gray-500 dark:text-gray-400">Follow the steps in the documentation that comes with the template.</span>
                                    <div x-show="open" class="mt-6 text-gray-700 dark:text-gray-200" x-transition>
                                        Just download the template repo in github and start using it. You will have to populate the database with your products/services to get it up and running. As simple as that.
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="mb-8">
                            <div class="bg-white rounded-lg dark:bg-gray-800">
                                <div x-data="{ open: false }">
                                    <button @click="open = !open" class="flex justify-between w-full text-xl font-semibold text-left text-gray-800">
                                        <p class="dark:text-gray-300">What are the features included in the E-commerce Template?</p>
                                        <svg x-show="!open" class="w-6 h-6 text-gray-800 dark:text-gray-300" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" d="m4.5 15.75 7.5-7.5 7.5 7.5" />
                                        </svg>
                                        <svg x-show="open" class="w-6 h-6 text-gray-800 dark:text-gray-300" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" d="m19.5 8.25-7.5 7.5-7.5-7.5" />
                                        </svg>
                                    </button>
                                    <span class="text-sm text-gray-500 dark:text-gray-400">A wide range of features to help you create a stunning and functional e-commerce website.</span>
                                    <div x-show="open" class="mt-6 text-gray-700 dark:text-gray-200" x-transition>
                                        E-commerce Template offers a wide range of features to help you create a stunning and functional e-commerce website, such as stripe payment gateway, email notifications, and more.
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="mb-8">
                            <div class="bg-white rounded-lg dark:bg-gray-800">
                                <div x-data="{ open: false }">
                                    <button @click="open = !open" class="flex justify-between w-full text-xl font-semibold text-left text-gray-800">
                                        <p class="dark:text-gray-300">Is E-commerce Template free to use?</p>
                                        <svg x-show="!open" class="w-6 h-6 text-gray-800 dark:text-gray-300" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" d="m4.5 15.75 7.5-7.5 7.5 7.5" />
                                        </svg>
                                        <svg x-show="open" class="w-6 h-6 text-gray-800 dark:text-gray-300" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" d="m19.5 8.25-7.5 7.5-7.5-7.5" />
                                        </svg>
                                    </button>
                                    <span class="text-sm text-gray-500 dark:text-gray-400">Yes, it's free to use.</span>
                                    <div x-show="open" class="mt-6 text-gray-700 dark:text-gray-200" x-transition>
                                        Yes, it's free to use, just download the repo and you're good to go.
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    
                    <div class="lg:w-1/2">
                        <h2 class="mt-16 mb-10 text-2xl font-semibold lg:mt-0 dark:text-gray-100">User related questions</h2>
                        <div class="mb-8">
                            <div class="bg-white rounded-lg dark:bg-gray-800">
                                <div x-data="{ open: false }">
                                    <button @click="open = !open" class="flex justify-between w-full text-xl font-semibold text-left text-gray-800">
                                        <p class="dark:text-gray-300">Can I customize the E-commerce Template?</p>
                                        <svg x-show="!open" class="w-6 h-6 text-gray-800 dark:text-gray-300" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" d="m4.5 15.75 7.5-7.5 7.5 7.5" />
                                        </svg>
                                        <svg x-show="open" class="w-6 h-6 text-gray-800 dark:text-gray-300" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" d="m19.5 8.25-7.5 7.5-7.5-7.5" />
                                        </svg>
                                    </button>
                                    <span class="text-sm text-gray-500 dark:text-gray-400">Customize the template to match your brand.</span>
                                    <div x-show="open" class="mt-6 text-gray-700 dark:text-gray-200" x-transition>
                                        Yes, the E-commerce Template is fully customizable. You can modify the design, add new features, and adapt it to your specific needs. The template is built with flexibility in mind to allow for easy customization.
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="mb-8">
                            <div class="bg-white rounded-lg dark:bg-gray-800">
                                <div x-data="{ open: false }">
                                    <button @click="open = !open" class="flex justify-between w-full text-xl font-semibold text-left text-gray-800">
                                        <p class="dark:text-gray-300">How does the admin panel work?</p>
                                        <svg x-show="!open" class="w-6 h-6 text-gray-800 dark:text-gray-300" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" d="m4.5 15.75 7.5-7.5 7.5 7.5" />
                                        </svg>
                                        <svg x-show="open" class="w-6 h-6 text-gray-800 dark:text-gray-300" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" d="m19.5 8.25-7.5 7.5-7.5-7.5" />
                                        </svg>
                                    </button>
                                    <span class="text-sm text-gray-500 dark:text-gray-400">An insight into what the admin panel looks like.</span>
                                    <div x-show="open" class="mt-6 text-gray-700 dark:text-gray-200" x-transition>
                                        The admin panel is very simple, it comes with CRUD operations for creating, editing, and deleting products, categories and tags. It also includes some app metrics to know whats happening.
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="mb-8">
                            <div class="bg-white rounded-lg dark:bg-gray-800">
                                <div x-data="{ open: false }">
                                    <button @click="open = !open" class="flex justify-between w-full text-xl font-semibold text-left text-gray-800">
                                        <p class="dark:text-gray-300">Do I need code knowledge to use the E-commerce Template?</p>
                                        <svg x-show="!open" class="w-6 h-6 text-gray-800 dark:text-gray-300" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" d="m4.5 15.75 7.5-7.5 7.5 7.5" />
                                        </svg>
                                        <svg x-show="open" class="w-6 h-6 text-gray-800 dark:text-gray-300" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" d="m19.5 8.25-7.5 7.5-7.5-7.5" />
                                        </svg>
                                    </button>
                                    <span class="text-sm text-gray-500 dark:text-gray-400">Yes, you need to have some basic coding knowledge to use the E-commerce Template.</span>
                                    <div x-show="open" class="mt-6 text-gray-700 dark:text-gray-200" x-transition>
                                        Just the basics to navigate through the files and adapt the texts and other basic features to your needs.
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="mb-8">
                            <div class="bg-white rounded-lg dark:bg-gray-800">
                                <div x-data="{ open: false }">
                                    <button @click="open = !open" class="flex justify-between w-full text-xl font-semibold text-left text-gray-800">
                                        <p class="dark:text-gray-300">How do I get support for the template?</p>
                                        <svg x-show="!open" class="w-6 h-6 text-gray-800 dark:text-gray-300" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" d="m4.5 15.75 7.5-7.5 7.5 7.5" />
                                        </svg>
                                        <svg x-show="open" class="w-6 h-6 text-gray-800 dark:text-gray-300" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" d="m19.5 8.25-7.5 7.5-7.5-7.5" />
                                        </svg>
                                    </button>
                                    <span class="text-sm text-gray-500 dark:text-gray-400">Just send me an email.</span>
                                    <div x-show="open" class="mt-6 text-gray-700 dark:text-gray-200" x-transition>
                                        A simple mail will be just fine! I'll try to answer as soon as possible.
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