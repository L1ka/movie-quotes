<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Movie;
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

    public function store(Movie $movie): RedirectResponse
    {

        $attributes = request()->validate([
            'title.*' => ['required','unique_translation:movies'],
        ]);

        $movie
        ->setTranslation('title', 'en', $attributes['title']['en'])
        ->setTranslation('title', 'ka', $attributes['title']['ka'])
        ->save();


        return redirect('movies/dashboard');
    }


    public function update(Movie $movie): RedirectResponse
    {
        $attributes = request()->validate([
            'title.*' => ['required','unique_translation:movies'],
        ]);

        $movie
        ->setTranslation('title', 'en', $attributes['title']['en'])
        ->setTranslation('title', 'ka', $attributes['title']['ka'])
        ->save();

        return redirect('movies/dashboard');
    }

    public function destroy(Movie $movie): RedirectResponse
    {
        $movie->delete();

        return redirect('movies/dashboard');
    }
}
