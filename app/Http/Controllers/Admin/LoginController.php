<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreLoginRequest;
use App\Models\Movie;
use Illuminate\Contracts\View\View;


class LoginController extends Controller
{
    public function store(StoreLoginRequest $request): View
    {
        $movies = Movie::with('quotes')->get();
        return view('movies_dashboard.index' , ['movies' => $movies]);
    }

    public function create($locale): View
    {
        if (! in_array($locale, ['en', 'ka'])) {
            abort(403);
        }
        app()->setLocale($locale);
        session()->put('locale', $locale);

        $movies = Movie::with('quotes')->get();
        return view('login' , ['movies' => $movies]);
    }
}
