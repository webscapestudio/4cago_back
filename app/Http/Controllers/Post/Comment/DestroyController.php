<?php

namespace App\Http\Controllers\Post\Comment;

use App\Http\Controllers\Controller;
use App\Models\Post;
use App\Models\Comment;
use Illuminate\Support\Facades\Auth;

class DestroyController extends Controller
{
    public function __invoke(Post $post, Comment $comment)
    {

        $post->comments()->where('id', $comment->id)->delete();

        return redirect()->back();
    }
}
