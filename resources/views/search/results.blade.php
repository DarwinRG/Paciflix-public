
@extends('layouts.main')

@section('content')
<div class="container mt-4">
  <h1 class="text-3xl fw-bold text-cyan my-4">Search Results for "{{ request('query') }}"</h1>
  @if($results->isEmpty())
    <p>No results found for "{{ request('query') }}".</p>
  @else
    <div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 row-cols-lg-5 g-4">
    @foreach($results as $result)
    <div class="col mb-4">
      @if($result['media_type'] === 'movie')
      <x-movie-card :movie="$result" />
    @elseif($result['media_type'] === 'tv')
      <x-tv-card :tvshow="$result" />
    @endif
    </div>
  @endforeach
    </div>
    <div class="d-flex justify-content-center mt-4">
      {{ $results->links('pagination::bootstrap-4') }}
    </div>
  @endif
</div>
@endsection