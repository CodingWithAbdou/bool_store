<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" dir="rtl">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>متجر كتب</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Cairo:wght@400;700&display=swap" >

        <!-- Box Icon -->
        <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
        <!-- Scripts -->
        @vite(['resources/css/app.css', 'resources/js/app.js'])

        <!-- Styles -->
        @livewireStyles
    </head>
    <body class="font-sans antialiased">

        <nav class="bg-white">
            <div class="mx-auto max-w-7xl px-2 sm:px-6 lg:px-8">
                <div class="relative flex h-16 items-center justify-between">
                    <div>
                        <a href=""><h1>متجر عبدو</h1></a>
                    </div>
                    <div class="flex flex-1 items-center justify-center">
                        <div class="hidden sm:ml-6 sm:block">
                            <div class="flex items-center justify-center">
                            <!-- Current: "bg-gray-900 text-white", Default: "text-gray-300 hover:bg-gray-700 hover:text-white" -->
                            <a href="#" class="text-gray-950 hover:text-gray-500  px-3 py-2 text-sm font-medium">
                                <span>
                                    <i class='bx bx-category-alt'></i>
                                </span>
                                <span>
                                    التصنيفات
                                </span>
                            </a>
                            <a href="#" class="text-gray-950  hover:text-gray-500  px-3 py-2 text-sm font-medium">
                                <span>
                                    <i class='bx bxs-user-detail'></i>
                                </span>
                                <span>
                                    الناشرون
                                </span>
                            </a>
                            <a href="#" class="text-gray-950  hover:text-gray-500  px-3 py-2 text-sm font-medium">
                                <span>
                                    <i class='bx bx-edit-alt'></i>
                                </span>
                                <span>
                                    المؤلفون
                                </span>
                            </a>
                            <a href="#" class="text-gray-950  hover:text-gray-500  px-3 py-2 text-sm font-medium">
                                <span>
                                    <i class='bx bx-cart-alt'></i>
                                </span>
                                <span>
                                    مشترياتي
                                </span>
                            </a>
                            </div>
                        </div>
                    </div>
                    @auth
                    <div class="ml-16 relative">
                        <x-dropdown align="right" width="48">
                            <x-slot name="trigger">
                                @if (Laravel\Jetstream\Jetstream::managesProfilePhotos())
                                    <button class="flex text-sm border-2 border-transparent rounded-full focus:outline-none focus:border-gray-300 transition">
                                        <img class="h-8 w-8 rounded-full object-cover" src="{{ Auth::user()->profile_photo_url }}" alt="{{ Auth::user()->name }}" />
                                    </button>
                                @else
                                    <span class="inline-flex rounded-md">
                                        <button type="button" class="inline-flex items-center px-3 py-2 border border-transparent text-sm leading-4 font-medium rounded-md text-gray-500 bg-white hover:text-gray-700 focus:outline-none focus:bg-gray-50 active:bg-gray-50 transition ease-in-out duration-150">
                                            {{ Auth::user()->name }}

                                            <svg class="ml-2 -mr-0.5 h-4 w-4" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
                                                <path stroke-linecap="round" stroke-linejoin="round" d="M19.5 8.25l-7.5 7.5-7.5-7.5" />
                                            </svg>
                                        </button>
                                    </span>
                                @endif
                            </x-slot>

                            <x-slot name="content" >
                                <!-- Account Management -->
                                <div class="block px-4 py-2 text-xs text-gray-400">
                                    {{ __('Manage Account') }}
                                </div>

                                <x-dropdown-link href="{{ route('profile.show') }}">
                                    {{ __('Profile') }}
                                </x-dropdown-link>

                                @if (Laravel\Jetstream\Jetstream::hasApiFeatures())
                                    <x-dropdown-link href="{{ route('api-tokens.index') }}">
                                        {{ __('API Tokens') }}
                                    </x-dropdown-link>
                                @endif

                                <div class="border-t border-gray-200"></div>

                                <!-- Authentication -->
                                <form method="POST" action="{{ route('logout') }}" x-data>
                                    @csrf

                                    <x-dropdown-link href="{{ route('logout') }}"
                                                @click.prevent="$root.submit();">
                                        {{ __('Log Out') }}
                                    </x-dropdown-link>
                                </form>
                            </x-slot>
                        </x-dropdown>
                    </div>
                    @elseauth
                    <div>
                        <a href="{{route('login')}}">{{__('login')}}</a>
                        <a href="{{route('register')}}">{{__('register')}}</a>
                        <a href=""></a>
                    </div>
                    @endauth


                </div>
            </div>
        </nav>


        <div class="min-h-screen bg-gray-100">
            <!-- Page Content -->
            <main>
                {{-- {{ $slot }} --}}
                <div class="p-4">
                    @yield('content')
                </div>
            </main>
        </div>
        @livewireScripts
    </body>
</html>
