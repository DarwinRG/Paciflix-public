@extends('layouts.main')

@section('content')
<div class="container mx-auto px-4 pt-8">
    <div class="d-none d-md-block">
        <div id="popularTvCarousel" class="carousel slide" data-bs-ride="carousel">
            <div class="carousel-inner">
                @foreach ($popularTv as $index => $tvshow)
                    <div class="carousel-item {{ $index == 0 ? 'active' : '' }}">
                        <a href="{{ route('tv.show', $tvshow['id']) }}">
                            <img src="{{ $tvshow['backdrop_path'] }}" class="d-block w-100 rounded-bottom-3" alt="{{ $tvshow['name'] }}"
                                style="aspect-ratio: 21/9; object-fit: cover;">
                        </a>
                        <div class="carousel-caption d-none d-md-block rounded bg-dark bg-opacity-50 shadow">
                            <h5 class="fw-bold fs-1" style="color: #08bffb">{{ $tvshow['name'] }}</h5>
                            <p class="px-4 text-white">{{ $tvshow['overview'] }}</p>
                        </div>
                    </div>
                @endforeach
            </div>
            <button class="carousel-control-prev" type="button" data-bs-target="#popularTvCarousel"
                data-bs-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Previous</span>
            </button>
            <button class="carousel-control-next" type="button" data-bs-target="#popularTvCarousel"
                data-bs-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Next</span>
            </button>
        </div>
    </div>
    <div class="text-center mb-8">
        <h1 class="text-3xl text-cyan mt-4 fw-bold">YOUR OCEAN OF ENTERTAINMENT</h1>
    </div>

    <div class="popular-tv mt-8">
        <h2 class="uppercase tracking-wider text-lg fw-bold" style="color: #08bffb">🔥Trending Shows</h2>
        <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-5 gap-8">
            @foreach ($popularTv as $tvshow)
                <x-tv-card :tvshow="$tvshow" />
            @endforeach
        </div>
    </div> <!-- end popular-tv -->

    <div class="top-rated-shows py-24">
        <h2 class="uppercase tracking-wider text-lg fw-bold" style="color: #08bffb">✨Top Rated Shows</h2>
        <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-5 gap-8">
            @foreach ($topRatedTv as $tvshow)
                <x-tv-card :tvshow="$tvshow" />
            @endforeach
        </div>
    </div> <!-- end top-rated-shows -->
</div>
@endsection