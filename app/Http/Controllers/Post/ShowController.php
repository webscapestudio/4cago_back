<?php

namespace App\Http\Controllers\Post;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Comment;

class ShowController extends Controller
{
    public function __invoke(Post $post)
    {
        $user = Auth::user();
        $posts = Post::latest()->with('like')->paginate(6);
        $comments = Comment::all();
        return view('posts.show', compact('post', 'user', 'comments', 'posts'));
    }
}
