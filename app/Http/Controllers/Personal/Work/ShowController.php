<?php

namespace App\Http\Controllers\Personal\Work;

use App\Http\Controllers\Controller;
use App\Models\Post;
use App\Models\Work;


class ShowController extends Controller
{
    public function __invoke(Work $work)
    {
        $posts = Post::latest()->with('like')->paginate(6);
        $works = Work::all();
        return view('personal.main.index', compact('work', 'works', 'posts'));
    }
}
