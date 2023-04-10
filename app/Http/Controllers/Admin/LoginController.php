<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreLoginRequest;
use App\Models\Movie;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Validation\ValidationException;

class LoginController extends Controller
{
    public function signIn(StoreLoginRequest $request): RedirectResponse
    {
        $validated = $request->validated();
        if (! auth()->attempt($validated)) {
            throw ValidationException::withMessages([
                'email' => 'Your provided credentials could not be verified.'
            ]);
        }
        session()->regenerate();

        return redirect('movies/dashboard');
    }

    public function index(): View
    {
        $movies = Movie::with('quotes')->get();
        return view('login' , ['movies' => $movies]);
    }


}
