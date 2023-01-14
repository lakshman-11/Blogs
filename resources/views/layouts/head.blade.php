<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Uchi Blogs') }}</title>

        <!-- Fonts -->
        <link rel="stylesheet" href="https://fonts.bunny.net/css2?family=Nunito:wght@400;600;700&display=swap">

        <!-- Scripts -->
        @vite(['resources/css/app.css', 'resources/js/app.js'])
    </head>
        <body class="bg-gray-100 h-screen antialiased leading-none font-sans">
            <div id="app">
                <header class="bg-gray-800 py-6">
                    <div class="container mx-auto flex justify-between items-center px-6">
                        <div>
                            <a href="{{ url('/') }}" class="text-lg font-semibold text-gray-100 no-underline">
                                {{ config('app.name', 'Uchi Blogs') }}
                            </a>
                        </div>
                        <nav class="space-x-4 text-gray-300 text-sm sm:text-base">
                            <a class="no-underline hover:underline" href="/">Home</a>
                            <a class="no-underline hover:underline" href="/blog">Blog</a>
                            @guest
                                <a class="no-underline hover:underline" href="{{ route('login') }}">{{ __('Login') }}</a>
                                @if (Route::has('register'))
                                    <a class="no-underline hover:underline" href="{{ route('register') }}">{{ __('Register') }}</a>
                                @endif
                            @else
                                <span>{{ Auth::user()->name }}</span>
        
                                <a href="{{ route('logout') }}"
                                   class="no-underline hover:underline"
                                   onclick="event.preventDefault();
                                        document.getElementById('logout-form').submit();">{{ __('Logout') }}</a>
                                <form id="logout-form" action="{{ route('logout') }}" method="POST" class="hidden">
                                    {{ csrf_field() }}
                                </form>
                            @endguest
                        </nav>
                    </div>
                </header>
        {{-- <div class="min-h-screen bg-gray-100">
            @include('layouts.navigation')

            <!-- Page Heading -->
            @if (isset($header))
                <header class="bg-white shadow">
                    <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">
                        {{ $header }}
                    </div>
                </header>
            @endif

            <!-- Page Content -->
            <main>
                {{ $slot }}
            </main>
        </div> --}}
        <div>
            @yield('content')
        </div>
    </body>
</html>
