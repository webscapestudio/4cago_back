<?php

namespace App\Http\Controllers\Personal\Main;

use App\Http\Controllers\Controller;
use App\Models\Post;


class ShowController extends Controller
{
    public function __invoke(Post $post)
    {
        $posts = Post::all();
        return view('personal.main.show', compact('post', 'posts'));
    }
}
