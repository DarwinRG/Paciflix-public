@extends('layouts.main')

@section('content')
<div class="container">
    <div class="ratio ratio-21x9 mb-4 d-none d-lg-block">
        <iframe src="https://embed.su/embed/movie/{{ $movie['id'] }}" allow="autoplay; encrypted-media"
            allowfullscreen></iframe>
    </div>
    <div class="ratio ratio-1x1 mb-4 d-lg-none">
        <iframe src="https://embed.su/embed/movie/{{ $movie['id'] }}" allow="autoplay; encrypted-media"
            allowfullscreen></iframe>
    </div>

    <div class="row">
        <div class="col-md-4">
            <img src="{{ $movie['poster_path'] }}" alt="poster" class="img-fluid ratio rounded">
        </div>
        <div class="col-md-8 text-white">
            <h2 class="display-4 fw-bold text-primary">{{ $movie['title'] }}</h2>
            <div class="d-flex align-items-center mb-3">
                <svg class="w-4" viewBox="0 0 24 24" fill="cyan">
                    <g data-name="Layer 2">
                        <path
                            d="M17.56 21a1 1 0 01-.46-.11L12 18.22l-5.1 2.67a1 1 0 01-1.45-1.06l1-5.63-4.12-4a1 1 0 01-.25-1 1 1 0 01.81-.68l5.7-.83 2.51-5.13a1 1 0 011.8 0l2.54 5.12 5.7.83a1 1 0 01.81.68 1 1 0 01-.25 1l-4.12 4 1 5.63a1 1 0 01-.4 1 1 1 0 01-.62.18z"
                            data-name="star" />
                    </g>
                </svg>
                <span>{{ $movie['vote_average'] }}</span>
                <span class="mx-2">|</span>
                <span>{{ $movie['release_date'] }}</span>
                <span class="mx-2">|</span>
                <span>{{ $movie['genres'] }}</span>
            </div>
            <div class="text-info">
                <h3 class="text-2xl font-semibold">Overview</h3>
                <p class="text-light">
                    {{ $movie['overview'] }}
                </p>
            </div>

            <div class="mt-4">
                <h3 class="text-2xl font-semibold text-info">Crew</h3>
                <div class="row mt-2">
                    @foreach ($movie['crew'] as $crew)
                        <div class="col-md-4 mb-2">
                            <div class="text-light">{{ $crew['name'] }}</div>
                            <div class="text-info text-opacity-75">{{ $crew['job'] }}</div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>

    <div class="mt-5 mb-4">
        <h2 class="text-4xl mb-2 font-semibold text-info">Cast</h2>
        <div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 row-cols-lg-5 g-4">
            @foreach ($movie['cast'] as $cast)
                <div class="col">
                    <img src="{{ $cast['profile_path'] }}" alt="actor1" class="img-fluid rounded hover-opacity">
                    <div class="mt-2">
                        <div class="text-primary text-opacity-75 fw-bold">{{ $cast['character'] }}</div>
                        <span class="text-light">{{ $cast['name'] }}</span>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</div>

@endsection