<?php

namespace App\Http\Controllers\Personal\Post;

use App\Models\Post;


class ShowController extends BaseController
{
    public function __invoke(Post $post)
    {
        $posts = Post::all();
        return view('personal.posts.show', compact('post', 'posts'));
    }
}
