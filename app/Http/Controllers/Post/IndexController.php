<?php

namespace App\Http\Controllers\Post;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Post;
use App\Models\Tag;
use Illuminate\Support\Facades\Auth;

class IndexController extends Controller
{
    public function __invoke()
    {
        $posts = Post::latest()->with('like')->paginate(6);
        $categories = Category::all();
        $tags = Tag::all();
        $user = Auth::user();
        return view('posts.index', compact('categories', 'posts', 'tags', 'user'));
    }
}
