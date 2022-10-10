<?php

namespace App\Http\Controllers\Personal\Post;

use App\Models\Post;


class DestroyController extends BaseController
{
    public function __invoke(Post $post)
    {
        $post->delete();
        return redirect()->route('personal.post.index');
    }
}
