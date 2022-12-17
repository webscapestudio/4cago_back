<?php

namespace App\Http\Controllers\Main;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Post;
use App\Models\Tag;
use Illuminate\Support\Facades\Auth;

class IndexController extends Controller
{
    public function __invoke()
    {
        $posts_read = Post::latest()->with('like')->where('published', '1')->paginate(6);
        $posts = Post::withCount('comments')
            ->orderBy('comments_count', 'desc')
            ->where('published', '1')
            ->paginate(12);
        $tags = Tag::all();
        $user = Auth::user();
        return view('main.index', compact('posts', 'tags', 'user', 'posts_read'));
    }
}
