<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- Open Graph Meta Tags -->
    <meta property="og:title" content="Paciflix | 🌊Your ocean of entertainment🍿" />
    <meta property="og:description" content="Enjoy a vast collection of movies and TV shows on Paciflix." />
    <meta property="og:image" content="{{ asset('ss_details.png') }}" />
    <meta property="og:url" content="{{ url()->current() }}" />
    <meta property="og:type" content="website" />
    <title>Paciflix | 🌊Your ocean of entertainment🍿</title>

    <!-- Favicon -->
    <link rel="icon" href="{{ asset('logo.png') }}" type="image/png">

    <!-- CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="{{ asset('css/main.css') }}">
    <!-- Icons -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <!-- Scripts -->
    <script src="https://cdn.jsdelivr.net/gh/alpinejs/alpine@v2.x.x/dist/alpine.min.js" defer></script>
    <livewire:styles />
</head>

<body class="bg-gray-900 text-white">
    <nav class="navbar navbar-dark bg-gray-900 shadow sticky-top navbar-expand-lg">
        <div class="container">
            <a class="fw-bold ms-4" href="{{ route('movies.index') }}">
                <img src="{{ asset('logo.png') }}" alt="Paciflix" class="d-inline-block align-text-top" height="100"
                    width="100">
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarOne"
                aria-controls="navbarOne" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse fw-bold" id="navbarOne">
                <ul class="nav nav-pills ms-auto mb-2 mt-2 mb-lg-0 me-4 align-items-center">
                    <li class="nav-item col-12 col-md-auto">
                        <a href="{{ route('movies.index') }}"
                            class="nav-link {{ request()->routeIs('movies.index') ? 'active' : '' }}">Movies</a>
                    </li>
                    <li class="nav-item col-12 col-md-auto">
                        <a href="{{ route('tv.index') }}"
                            class="nav-link {{ request()->routeIs('tv.index') ? 'active' : '' }}">TV Shows</a>
                    </li>
                    <li class="nav-item col-12 col-md-auto align-items-center px-1 py-1">
                        <form class="d-flex" action="{{ route('search') }}" method="GET">
                            <div class="input-group">
                                <input class="form-control w-50" type="search" name="query" placeholder="Search "
                                    aria-label="Search">
                                <select class="form-select w-25" name="type">
                                    <option value="movie">Movie</option>
                                    <option value="tv">TV</option>
                                </select>
                                <button class="btn btn-success" type="submit"><i class="bi bi-search"></i>
                                    Search</button>
                            </div>
                        </form>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <main class="container py-0 bg-gray-900">
        @yield('content')
    </main>

    <footer class="bg-gray-900 shadow text-white mt-auto py-4">
        <div class="container text-center">
            <div class="fw-bold">
                Made with ❤️ by <a href="https://darwinrg.tech" class="text-decoration-none"
                    style="color: #08bffb">DarwinRG</a>
            </div>
            <span></span>
            <span class="text-primary">© 2024 Paciflix. All rights reserved.</span>
            <div class="fw-light">Disclaimer: This site does not store any files on its server. All contents are
                provided by non-affiliated third parties.</div>
        </div>
    </footer>

    <!-- Scripts -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz"
        crossorigin="anonymous"></script>
    <livewire:scripts />
    @yield('scripts')
</body>

</html>