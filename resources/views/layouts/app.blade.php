<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name') }}</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />        
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css"/>


    <!-- Scripts -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>   
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script>
            
    @livewireStyles
    @stack('styles')
</head>
<body class="font-sans antialiased">
    <div class="flex flex-col min-h-screen bg-gray-100 dark:bg-gray-900">
        <!-- Navigation -->
        <div class="sticky top-0 z-50">
            <livewire:layout.navigation />
        </div>

        <!-- Page Heading -->
        @if (isset($header))
        <header class="hidden bg-white shadow md:block dark:bg-gray-800 top-16">
            <div class="px-4 py-6 mx-auto max-w-7xl sm:px-6 lg:px-8">
                    {{ $header }}
                </div>
            </header>
        @endif

        <!-- Page Content -->
        <main class="flex-grow min-h-screen">
            @if(auth()->check() && auth()->user()->admin === 1 && !request()->is('/'))
                <div class="flex min-h-screen">
                    <div class="sticky h-full overflow-y-auto top-16">
                        <x-admin-sidebar />
                    </div>
                    <div class="flex-1">
                        {{ $slot }}
                    </div>
                </div>
            @elseif(auth()->check() && auth()->user()->admin === 0 && !request()->is('/'))
                <div class="flex min-h-screen">
                    <div class="sticky h-full overflow-y-auto top-16">
                        <x-user-sidebar />
                    </div>
                    <div class="flex-1">
                        {{ $slot }}
                    </div>
                </div>
            @else
                {{ $slot }}
            @endif
        </main>

        <!-- Footer -->
        <x-footer />
    </div>
    
    @livewireScripts
    @stack('scripts')
</body>
</html>