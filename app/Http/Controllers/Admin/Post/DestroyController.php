<?php

namespace App\Http\Controllers\Admin\Post;

use App\Http\Controllers\Controller;
use App\Models\Post;
use Illuminate\Http\Request;

class DestroyController extends Controller
{
    public function __invoke($slug)
    {
        $post = Post::whereSlug($slug)->firstOrFail();
        $post->comments()->where('commentable_id', $post->id)->delete();
        $post->delete();
        return redirect()->route('admin.post.index');
    }
}
