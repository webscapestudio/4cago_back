<?php

namespace App\Http\Controllers\Personal\Work;

use App\Http\Controllers\Controller;
use App\Models\Work;


class ShowController extends Controller
{
    public function __invoke(Work $work)
    {
        $works = Work::all();
        return view('personal.main.index', compact('work', 'works'));
    }
}
