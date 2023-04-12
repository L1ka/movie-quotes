<?php

namespace App\Http\Controllers;

use App\Models\Movie;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;

class MovieController extends Controller
{
    public function index(Movie $movie): View | RedirectResponse
    {
        if($movie->count() === 0){
           return redirect()->route('login.index');
        }

        $movie = Movie::with('quotes')->get()->random();

        if($movie->quotes->count() !== 0) {
            $quote = $movie->quotes->random();
        }

        return view('index', [
            'movie' => $movie,
            'quote' => $quote ?? null
            ]);
    }

    public function list(Movie $movie): View
    {
        return view('list', [
            'movie' => $movie
        ]);
    }

}
