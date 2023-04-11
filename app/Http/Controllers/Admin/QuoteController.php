<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\quote\StoreQuoteRequest;
use App\Models\Quote;
use App\Models\Movie;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;

class QuoteController extends Controller
{

    public function create(): View
    {
        return view('quotes.create', ['movies' =>  Movie::all()]);
    }

    public function edit(Quote $quote): View
    {
        return view('quotes.edit', ['quote' => $quote, 'movie' =>  Movie::where('id', $quote->movie_id)->first()]);
    }

    public function store(StoreQuoteRequest $request): RedirectResponse
    {
        Quote::create([
            ...$request->validated()
           ,
            'thumbnail' => '/storage/'.request()->file('thumbnail')->store('thumbnails'),
        ]);


        return redirect()->route('movies_dashboard.index');
    }

    public function update(StoreQuoteRequest $request, Quote $quote): RedirectResponse
    {
        $quote->update([
            ...$request->validated()
           ,
            'thumbnail' => '/storage/'.request()->file('thumbnail')->store('thumbnails'),
        ]);

        return redirect()->route('movies_dashboard.index');
    }

    public function destroy(Quote $quote): View
    {
        $quote->delete();

        $movies = Movie::with('quotes')->get();

        return view('movies_dashboard.index' , ['movies' => $movies]);
    }
}
