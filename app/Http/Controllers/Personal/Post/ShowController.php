<?php

namespace App\Http\Controllers\Personal\Post;

use App\Models\Post;


class ShowController extends BaseController
{
    public function __invoke(Post $post)
    {
        return view('personal.posts.show', compact('post'));
    }
}
