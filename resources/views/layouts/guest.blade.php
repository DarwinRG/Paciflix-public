<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <!-- Open Graph Meta Tags -->
    <meta property="og:title" content="Paciflix | 🌊Your ocean of entertainment🍿" />
    <meta property="og:description" content="Enjoy a vast collection of movies and TV shows on Paciflix." />
    <meta property="og:image" content="{{ asset('ss_details.png') }}" />
    <meta property="og:url" content="{{ url()->current() }}" />
    <meta property="og:type" content="website" />

    <title>Paciflix | 🌊Your ocean of entertainment🍿</title>
    <!-- Favicon -->
    <link rel="icon" href="{{ asset('logo.png') }}" type="image/png">

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

    <!-- Scripts -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <style>
        .background-tint {
            position: relative;
            z-index: 1;
        }

        .background-tint::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: rgba(0, 0, 0, 0.8);
            /* Adjust the opacity as needed */
            z-index: -1;
        }
    </style>
</head>

<body class="font-sans text-gray-900 antialiased">
    <div class="min-h-screen flex flex-col sm:justify-center items-center pt-6 sm:pt-0 background-tint"
        style="background-image: url('{{ asset('poster-background.jpg') }}'); background-size: cover; background-position: center;">
        <div>
            <a href="/">
                <img src="{{ asset('logo.png') }}" alt="Paciflix" class="w-40 mx-auto" />
            </a>
        </div>

        <div
            class="w-full sm:max-w-md mt-6 px-6 py-4 bg-white dark:bg-gray-800 shadow-md overflow-hidden sm:rounded-lg">
            {{ $slot }}
        </div>
        <footer class="text-white mt-auto mb-4 px-4">
            <div class="container mx-auto text-center">
                <div class="font-bold">
                    Made with ❤️ by <a href="https://darwinrg.tech"
                        class="text-decoration-none text-blue-400">DarwinRG</a>
                </div>
                <span></span>
                <span class="text-blue-500">© 2024 Paciflix. All rights reserved.</span>
                <div class="font-light">Disclaimer: This site does not store any files on its server. All contents are
                    provided by non-affiliated third parties.</div>
            </div>
        </footer>
    </div>
</body>



</html>