<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Laravel') }}</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

        <script src="{{asset('js/tailwindcss.js')}}"></script>
        <script src="{{asset('js/jquery-3.7.1.min.js')}}"></script>
        
        <!-- Scripts -->
        <script src="{{asset('js/htmx.min.js')}}"></script>
        <script src="{{asset('js/html5-qrcode.min.js')}}"></script>
        @vite(['resources/css/app.css', 'resources/js/app.js'])
    </head>
    <body class="font-sans antialiased">
        <div class="min-h-screen bg-gradient-to-b from-white to-green-200 ">
            @include('layouts.navigation')

            <!-- Page Heading -->
            @isset($header)
                <header class="bg-gradient-to-tl from-pink-100 to-pink-400 bg-gradient shadow">
                    <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">
                        {{ $header }}
                        
                    </div>
                </header>
            @endisset
            <!-- Page Content -->
            <div class=" mt-1 w-full">
                @include('components.alert-message')
            </div>
            <main>
                {{ $slot }}
            </main>
        </div>
    </body>
</html>
