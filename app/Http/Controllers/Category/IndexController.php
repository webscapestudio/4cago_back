<?php

namespace App\Http\Controllers\Category;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class IndexController extends Controller
{
    public function __invoke()
    {
        $categories = Category::where('parent_id', '0')->get();
        $user = Auth::user();
        $posts = Post::latest()->with('like')->paginate(6);
        return view('categories_posts.index', compact('categories', 'user', 'posts'));
    }
}
