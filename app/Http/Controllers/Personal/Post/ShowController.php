<?php

namespace App\Http\Controllers\Personal\Post;

use App\Http\Controllers\Controller;
use App\Models\Post;
use Illuminate\Support\Facades\Auth;

class ShowController extends Controller
{
    public function __invoke(Post $post)
    {
        $user = Auth::user();
        $posts = Post::all();
        return view('personal.posts.show', compact('post', 'posts', 'user'));
    }
}
