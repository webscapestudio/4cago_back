<?php

namespace App\Http\Controllers\Personal\Post;

use App\Http\Controllers\Controller;
use App\Models\Post;


class DestroyController extends Controller
{
    public function __invoke($slug)
    {
        $post = Post::whereSlug($slug)->firstOrFail();
        $post->delete();
        return redirect()->route('personal.post.index');
    }
}
