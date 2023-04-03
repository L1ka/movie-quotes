<?php

namespace App\Http\Controllers;


use App\Models\Movie;


class UpdateController extends Controller
{
    public function create()
    {
        return view('components.movie-add');

    }

}
