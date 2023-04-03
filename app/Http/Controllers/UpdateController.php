<?php

namespace App\Http\Controllers;


use App\Models\Movie;


class UpdateController extends Controller
{
    public function create()
    {
        return view('components.movie-add');
    }


    public function store()
    {
        //store new movie in the database

        $attributes = request()->validate([
            'title.*' => ['required','unique_translation:movies'],
        ]);


        $movieItem = new Movie;
        $movieItem
        ->setTranslation('title', 'en', $attributes['title']['en'])
        ->setTranslation('title', 'ka', $attributes['title']['ka'])
        ->save();


       $movies = $movieItem::with('quotes')->get();

        return view('components.admin-panel' , ['movies' => $movies]);
    }

    public function edit(Movie $movie)
    {
       $geo = $movie->getTranslation('title', 'ka');
       $en = $movie->getTranslation('title', 'en');


        return view('components.movie-edit', ['movie' => $movie, 'geo' => $geo, 'en' => $en]);
    }

    public function update()
    {
        $attributes = request()->validate([
            'title.*' => ['required','unique_translation:movies'],
        ]);

        $movieItem = new Movie;
        $movieItem
        ->setTranslation('title', 'en', $attributes['title']['en'])
        ->setTranslation('title', 'ka', $attributes['title']['ka'])
        ->save();

        $movies = $movieItem::with('quotes')->get();


        return view('components.admin-panel' , ['movies' => $movies]);
    }


}
