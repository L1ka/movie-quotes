<?php

namespace App\Http\Controllers;

use App\Models\Movie;
use Illuminate\Contracts\View\View;

class MovieController extends Controller
{
    public function index(): View
    {

        $movie = Movie::with('quotes')->get()->random();
        if($movie->quotes->count() === 0){
            return view('index', [
                'movie' => $movie,
                'quote' => null
            ]);
        }

        $quote = $movie->quotes->random();

        return view('index', [
            'movie' => $movie,
            'quote' => $quote
        ]);
    }

    public function list(Movie $movie): View
    {
        return view('list', [
            'movie' => $movie
        ]);
    }

}
