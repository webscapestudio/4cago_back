<?php

namespace App\Http\Controllers\Category\Post;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Comment;

class ShowController extends Controller
{
    public function __invoke($category_id, $post_id)
    {
        $post = Post::find($post_id);
        $user = Auth::user();
        $posts = Post::latest();
        $comments = Comment::all();
        return view('posts.show', compact('post', 'user', 'comments', 'posts'));
    }
}
