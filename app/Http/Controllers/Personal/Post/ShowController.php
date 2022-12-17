<?php

namespace App\Http\Controllers\Personal\Post;

use App\Http\Controllers\Controller;
use App\Models\Comment;
use App\Models\Post;
use Illuminate\Support\Facades\Auth;

class ShowController extends Controller
{
    public function __invoke($post_id)
    {

        $post = Post::find($post_id);
        $user = Auth::user();
        $posts_read = Post::latest()->with('like')->where('published', '1')->paginate(6);
        $comments = Comment::all();
        return view('personal.posts.show', compact('post', 'user', 'comments', 'posts_read'));
    }
}
