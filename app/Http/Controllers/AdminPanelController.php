<?php

namespace App\Http\Controllers;

use App\Models\Movie;


class AdminPanelController extends Controller
{
    public function create()
    {
        $movies = Movie::with('quotes')->get();


        return view('components.admin-panel', ['movies' => $movies]);
    }
}
