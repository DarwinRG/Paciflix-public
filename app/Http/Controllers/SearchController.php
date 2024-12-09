<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Illuminate\Pagination\LengthAwarePaginator;
use Carbon\Carbon;

class SearchController extends Controller
{
  public function index(Request $request)
  {
    $query = $request->input('query');
    $type = $request->input('type', 'movie');
    $page = $request->input('page', 1);

    if ($type === 'movie') {
      $results = Http::withToken(config('services.tmdb.token'))
        ->get('https://api.themoviedb.org/3/search/movie', [
          'query' => $query,
          'page' => $page,
        ])
        ->json()['results'];
    } else {
      $results = Http::withToken(config('services.tmdb.token'))
        ->get('https://api.themoviedb.org/3/search/tv', [
          'query' => $query,
          'page' => $page,
        ])
        ->json()['results'];
    }

    // Add media_type, vote_average, release_date, and first_air_date to each result
    $results = array_map(function ($result) use ($type) {
      $result['media_type'] = $type;
      $result['poster_path'] = $result['poster_path']
        ? 'https://image.tmdb.org/t/p/w500' . $result['poster_path']
        : 'https://placehold.co/500x750?text=No+Image\nAvailable';
      $result['vote_average'] = isset($result['vote_average']) ? $result['vote_average'] * 10 . '%' : 'N/A';
      $result['release_date'] = $type === 'movie' && isset($result['release_date'])
        ? Carbon::parse($result['release_date'])->format('Y')
        : 'N/A';
      $result['first_air_date'] = $type === 'tv' && isset($result['first_air_date'])
        ? Carbon::parse($result['first_air_date'])->format('Y')
        : 'N/A';
      return $result;
    }, $results);

    $perPage = 20;
    $offset = ($page - 1) * $perPage;
    $paginatedResults = new LengthAwarePaginator(
      array_slice($results, $offset, $perPage),
      count($results),
      $perPage,
      $page,
      ['path' => $request->url(), 'query' => $request->query()]
    );

    return view('search.results', [
      'results' => $paginatedResults,
    ]);
  }
}