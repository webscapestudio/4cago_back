<?php

namespace App\Http\Controllers\Category\Post\Comment;

use App\Http\Controllers\Controller;
use App\Models\Post;
use App\Models\Comment;
use Illuminate\Support\Facades\Auth;

class DestroyController extends Controller
{
    public function __invoke($category_id, $post_id, Comment $comment)
    {
        $comment->replies()->delete();
        $post = Post::find($post_id);
        $post->comments()->where('id', $comment->id)->delete();

        return redirect()->back();
    }
}
