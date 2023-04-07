<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreLoginRequest;
use App\Models\Movie;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;

class LoginController extends Controller
{
    public function store(StoreLoginRequest $request): RedirectResponse
    {
        return redirect('movies/dashboard');
    }

    public function create(): View
    {
        $movies = Movie::with('quotes')->get();
        return view('login' , ['movies' => $movies]);
    }


}
