<?php

namespace App\Http\Controllers\Admin;
use App\Http\Requests\Movie\StoreMovieRequest;
use App\Http\Controllers\Controller;
use App\Models\Movie;
use App\Models\Quote;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;

class MovieController extends Controller
{

    public function index(): View
    {
        return view('movies_dashboard.index', ['movies' => Movie::with('quotes')->get()]);
    }

    public function edit(Movie $movie): View
    {
        return view('movies.edit', ['movie' => $movie]);
    }

    public function store(Movie $movie, StoreMovieRequest $request ): RedirectResponse
    {
        $attributes = $request->validated();

        $movie
        ->setTranslation('title', 'en', $attributes['title']['en'])
        ->setTranslation('title', 'ka', $attributes['title']['ka'])
        ->save();


        return redirect()->route('movies_dashboard.index');
    }


    public function update(Movie $movie, StoreMovieRequest $request): RedirectResponse
    {
        $attributes = $request->validated();

        $movie
        ->setTranslation('title', 'en', $attributes['title']['en'])
        ->setTranslation('title', 'ka', $attributes['title']['ka'])
        ->save();

        return redirect()->route('movies_dashboard.index');
    }

    public function destroy(Movie $movie): RedirectResponse
    {
        $movie->delete();

        return redirect()->route('movies_dashboard.index');
    }

    public function list(Movie $movie): View
    {
        return view('list', ['movie' => $movie]);
    }

}
