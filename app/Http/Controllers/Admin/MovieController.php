<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Movie;
use Illuminate\Contracts\View\View;

class MovieController extends Controller
{

    public function store(Movie $movie): View
    {

        $attributes = request()->validate([
            'title.*' => ['required','unique_translation:movies'],
        ]);

        $movie
        ->setTranslation('title', 'en', $attributes['title']['en'])
        ->setTranslation('title', 'ka', $attributes['title']['ka'])
        ->save();


       $movies =  $movie::with('quotes')->get();

        return view('movies.dashboard' , ['movies' => $movies]);
    }


    public function update(Movie $movie): View
    {
        $attributes = request()->validate([
            'title.*' => ['required','unique_translation:movies'],
        ]);

        $movie
        ->setTranslation('title', 'en', $attributes['title']['en'])
        ->setTranslation('title', 'ka', $attributes['title']['ka'])
        ->save();

        $movies = $movie::with('quotes')->get();


        return view('movies.dashboard' , ['movies' => $movies]);
    }
}