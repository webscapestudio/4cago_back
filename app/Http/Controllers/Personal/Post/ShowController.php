<?php

namespace App\Http\Controllers\Personal\Post;

use App\Http\Controllers\Controller;
use App\Models\Post;


class ShowController extends Controller
{
    public function __invoke(Post $post)
    {
        $posts = Post::all();
        return view('personal.posts.show', compact('post', 'posts'));
    }
}
