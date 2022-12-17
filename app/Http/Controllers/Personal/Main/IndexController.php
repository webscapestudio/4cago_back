<?php

namespace App\Http\Controllers\Personal\Main;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Post;
use App\Models\Tag;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class IndexController extends Controller
{
    public function __invoke()
    {
        $posts_read = Post::latest()->with('like')->where('published', '1')->paginate(6);
        $user = Auth::user();
        $posts = User::find($user->id)->posts;
        $categories = Category::all();
        $tags = Tag::all();

        return view('personal.main.index', compact('categories', 'posts', 'tags', 'user', 'posts_read'));
    }
}
