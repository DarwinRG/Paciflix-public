@extends('layouts.main')

@section('content')
<div class="container">
    <div class="text-center">
        <h1 class="text-3xl fw-bold my-4">YOUR OCEAN OF ENTERTAINMENT</h1>
    </div>
    <div class="ratio ratio-16x9 d-none d-lg-block">
        <iframe class="rounded-4" id="tvFrame" src="https://embed.su/embed/tv/{{ $tvshow['id'] }}/1/1" allow="autoplay; encrypted-media"
            allowfullscreen></iframe>
    </div>
    <div class="ratio ratio-1x1 d-lg-none">
        <iframe class="rounded-4" id="tvFrame" src="https://embed.su/embed/tv/{{ $tvshow['id'] }}/1/1" allow="autoplay; encrypted-media"
            allowfullscreen></iframe>
    </div>
    <div class="text-center mt-2 my-5 dropdown-center">
        <button class="btn btn-primary btn-lg dropdown-toggle rounded-5" type="button" id="serverDropdown"
            data-bs-toggle="dropdown" aria-expanded="false">
            Change Server
        </button>
        <ul class="dropdown-menu dropdown-menu-dark" aria-labelledby="serverDropdown">
            <li><a class="dropdown-item fw-bold text-info text-center" href="#"
                    data-server-url="https://embed.su/embed/tv/{{ $tvshow['id'] }}/1/1">Primary</a></li>
            <li><a class="dropdown-item fw-bold text-white text-center" href="#"
                    data-server-url="https://multiembed.mov/directstream.php?video_id={{ $tvshow['id']}}&tmdb=1&s=1&e=1">Secondary</a>
            </li>
        </ul>
    </div>
</div>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        const serverLinks = document.querySelectorAll('.dropdown-item');
        serverLinks.forEach(link => {
            link.addEventListener('click', function(event) {
                event.preventDefault();
                const url = this.getAttribute('data-server-url');
                changeTvServer(url);
            });
        });
    });

    function changeTvServer(url) {
        document.getElementById('tvFrame').src = url;
    }
</script>

<div class="row">
    <div class="col-md-4 text-white">
        <img src="{{ $tvshow['poster_path'] }}" alt="poster" class="img-fluid rounded">
    </div>
    <div class="col-md-8 text-white">
        <h2 class="display-4 fw-bold text-primary">{{ $tvshow['name'] }}</h2>
        <div class="d-flex align-items-center mb-3">
            <svg class="w-4" viewBox="0 0 24 24" fill="cyan">
                <g data-name="Layer 2">
                    <path
                        d="M17.56 21a1 1 0 01-.46-.11L12 18.22l-5.1 2.67a1 1 0 01-1.45-1.06l1-5.63-4.12-4a1 1 0 01-.25-1 1 1 0 01.81-.68l5.7-.83 2.51-5.13a1 1 0 011.8 0l2.54 5.12 5.7.83a1 1 0 01.81.68 1 1 0 01-.25 1l-4.12 4 1 5.63a1 1 0 01-.4 1 1 0 01-.62.18z"
                        data-name="star" />
                </g>
            </svg>
            <span class="fw-bold">{{ $tvshow['vote_average'] }}</span>
            <span class="mx-2">|</span>
            <span class="fw-bold">{{ $tvshow['first_air_date'] }}</span>
            <span class="mx-2">|</span>
            <span class="fw-bold">{{ $tvshow['genres'] }}</span>
        </div>

        <div class="text-info">
            <h3 class="text-2xl fw-bold">Overview</h3>
            <p class="text-light">
                {{ $tvshow['overview'] }}
            </p>
        </div>

        <div class="mt-4">
            <h3 class="text-2xl fw-bold text-info">Creator</h3>
            <div class="row mt-2">
                @foreach ($tvshow['created_by'] as $crew)
                <div class="col-md-4 mb-2">
                    <div class="text-light fw-bold">{{ $crew['name'] }}</div>
                    <div class="text-opacity-75">Creator</div>
                </div>
                @endforeach
            </div>
        </div>
    </div>
</div>

<div class="mt-5 mb-4">
    <h2 class="text-4xl mb-2 fw-bold text-info">Characters</h2>
    <div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 row-cols-lg-5 g-4">
        @foreach ($tvshow['cast'] as $cast)
        <div class="col">
            <img src="{{ $cast['profile_path'] }}" alt="actor1" class="img-fluid rounded hover-opacity">
            <div class="mt-2">
                <div class="text-opacity-75 fw-bold">{{ $cast['character'] }}</div>
                <span class="text-light">{{ $cast['name'] }}</span>
            </div>
        </div>
        @endforeach
    </div>
</div>
@endsection