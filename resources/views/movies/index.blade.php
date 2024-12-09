@extends('layouts.main')

@section('content')
<div class="container mx-auto px-4 pt-8">

    <div class="d-none d-md-block">
        <div id="popularMoviesCarousel" class="carousel slide" data-bs-ride="carousel">
            <div class="carousel-inner">
                @foreach ($popularMovies as $index => $movie)
                    <div class="carousel-item {{ $index == 0 ? 'active' : '' }}">
                        <a href="{{ route('movies.show', $movie['id']) }}">
                            <img src="{{ $movie['backdrop_path'] }}" class="d-block w-100" alt="{{ $movie['title'] }}"
                                style="aspect-ratio: 21/9; object-fit: cover;">
                        </a>
                        <div class="carousel-caption d-none d-md-block rounded bg-dark bg-opacity-50 shadow text-gray">
                            <h5 style="color: #08bffb">{{ $movie['title'] }}</h5>
                            <p>{{ $movie['overview'] }}</p>
                        </div>
                    </div>
                @endforeach
            </div>
            <button class="carousel-control-prev" type="button" data-bs-target="#popularMoviesCarousel"
                data-bs-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Previous</span>
            </button>
            <button class="carousel-control-next" type="button" data-bs-target="#popularMoviesCarousel"
                data-bs-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Next</span>
            </button>
        </div>
    </div>
    <div class="text-center mb-8">
        <h1 class="text-3xl fw-bold text-cyan my-4">YOUR OCEAN OF ENTERTAINMENT</h1>
    </div>
    <div class="popular-movies mt-8">
        <h2 class="uppercase tracking-wider text-lg fw-bold" style="color: #08bffb">🔥Trending Movies</h2>
        <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-5 gap-8">
            @foreach ($popularMovies as $movie)
                <x-movie-card :movie="$movie" />
            @endforeach
        </div>
    </div> <!-- end popular-movies -->

    <div class="now-playing-movies py-24">
        <h2 class="uppercase tracking-wider text-lg fw-bold" style="color: #08bffb">✨New Movies</h2>
        <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-5 gap-8">
            @foreach ($nowPlayingMovies as $movie)
                <x-movie-card :movie="$movie" />
            @endforeach
        </div>
    </div> <!-- end now-playing-movies -->
</div>
@endsection