<?php

namespace App\Http\Controllers\Personal\Advertisement;

use App\Http\Controllers\Controller;
use App\Models\Advertisement;
use App\Models\Post;

class ShowController extends Controller
{
    public function __invoke(Advertisement $advertisement)
    {
        $posts = Post::latest()->with('like')->paginate(6);
        $advertisements = Advertisement::all();
        return view('personal.advertisements.show', compact('advertisement', 'advertisements', 'posts'));
    }
}
