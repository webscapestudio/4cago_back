<?php

namespace App\Http\Controllers\Personal\Advertisement;

use App\Http\Controllers\Controller;
use App\Models\Advertisement;


class ShowController extends Controller
{
    public function __invoke(Advertisement $advertisement)
    {
        $advertisements = Advertisement::all();
        return view('personal.advertisements.index', compact('advertisement', 'advertisements'));
    }
}
