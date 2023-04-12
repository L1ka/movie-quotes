<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Http\Requests\Login\StoreLoginRequest;
use App\Models\Movie;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Validation\ValidationException;

class AuthController extends Controller
{
    public function signIn(StoreLoginRequest $request): RedirectResponse
    {
        if (! auth()->attempt($request->validated())) {
            throw ValidationException::withMessages([
                'email' => 'Your provided credentials could not be verified.'
            ]);
        }
        session()->regenerate();

        return redirect()->route('movies_dashboard.index');
    }

    public function index(): View
    {
        $movies = Movie::with('quotes')->get();
        return view('login' , ['movies' => $movies]);
    }
}
