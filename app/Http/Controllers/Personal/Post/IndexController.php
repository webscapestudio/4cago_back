<?php

namespace App\Http\Controllers\Personal\Post;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Post;
use App\Models\Tag;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class IndexController extends Controller
{
    public function __invoke($categoryId = 0)
    {
        $user = Auth::user();
        $posts_read = Post::latest()->with('like')->where('published', '1')->paginate(6);
        $posts =  User::find($user->id)->posts->where('published', '1');
        $categories = Category::get();
        if ($categoryId) {
            $posts->where('category_id', $categoryId);
        }
        $tags = Tag::all();
        $user = Auth::user();
        return view('personal.posts.index', [
            'posts' => $posts,
            'categories' => $categories->where('published', '1')
        ], compact('tags', 'user', 'posts_read'));
    }
}
