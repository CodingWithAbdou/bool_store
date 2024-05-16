<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" dir="rtl">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>متجر الكتب</title>

        <!-- Font Family-->
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Cairo:wght@400;700&display=swap" >

        <!-- Box Icon -->
        <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
        <!-- Scripts -->
        @vite(['resources/css/app.css', 'resources/js/app.js'])
        @stack('style')
        <!-- Styles -->
        @livewireStyles
    </head>
    <body class="font-sans antialiased">

        <nav class="bg-white">
            <div class="mx-auto max-w-7xl px-2 sm:px-6 lg:px-8">
                <div class="relative flex h-16 items-center justify-between">
                    <div>
                        <a href="{{route('home')}}"><h1>لوقو الموقع</h1></a>
                    </div>
                    <div class="flex flex-1 items-center justify-center">
                        <div class="hidden sm:ml-6 sm:block">
                            <div class="flex items-center justify-center">
                            <a href="{{ route('category.index') }}" class="{{Route::current()->getName() == 'category.index' ? 'active' : ''}} relative text-gray-950 hover:text-gray-500  px-3 py-2 text-sm font-medium">
                                <span>
                                    <i class='bx bx-category-alt'></i>
                                </span>
                                <span>
                                    التصنيفات
                                </span>
                            </a>
                            <a href="{{ route('publisher.index') }}" class=" {{Route::current()->getName() == 'publisher.index' ? 'active' : ''}} relative text-gray-950  hover:text-gray-500  px-3 py-2 text-sm font-medium">
                                <span>
                                    <i class='bx bxs-user-detail'></i>
                                </span>
                                <span>
                                    الناشرون
                                </span>
                            </a>
                            <a href="{{ route('author.index') }}" class="{{Route::current()->getName() == 'author.index' ? 'active' : ''}} relative text-gray-950  hover:text-gray-500  px-3 py-2 text-sm font-medium">
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
                        <x-dropdown align="left" width="48">
                            <x-slot name="trigger">
                                    <button class="flex text-sm border-2 border-transparent rounded-full focus:outline-none focus:border-gray-300 transition">
                                        <img class="h-8 w-8 rounded-full object-cover" src="{{ Auth::user()->profile_photo_url }}" alt="{{ Auth::user()->name }}" />
                                    </button>
                            </x-slot>

                            <x-slot name="content" >
                                <!-- Account Management -->
                                <div class="block px-4 py-2 text-xs text-gray-400">
                                    {{ __('Manage Account') }}
                                </div>
                                @can('update-books')
                                    <x-dropdown-link href="{{ route('admin.home') }}">
                                        {{ __('Dashboord') }}
                                    </x-dropdown-link>
                                @endcan
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
                    @else
                    <div >
                        <a class="mx-2 text-sm" href="{{route('login')}}">{{__('login')}}</a>
                        <a class="mx-2 text-sm"  href="{{route('register')}}">{{__('register')}}</a>
                    </div>
                    @endauth
                </div>
            </div>
        </nav>


        <div class="min-h-screen bg-gray-100">
            <!-- Page Content -->
            <main>
                {{-- {{ $slot }} --}}
                <div class="py-4">
                    @yield('content')
                </div>
            </main>
        </div>
        @stack('script')
        @livewireScripts
    </body>
</html>

<style>
    .active::after {
        content: '';
        width: 100%;
        height: 2px;
        background: rgb(0, 132, 255);
        position: absolute ;
        bottom: -15px;
        left: 0;
    }
</style>
