<?php

namespace App\Http\Controllers\Personal\Post;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Tag;
use App\Models\Post;
use Illuminate\Support\Facades\Auth;

class CreateController extends Controller
{
    public function __invoke()
    {
        $posts_read = Post::latest()->with('like')->where('published', '1')->paginate(6);
        $categories = Category::all();
        $tags = Tag::all();
        $user = Auth::user();
        return view('personal.posts.create', [
            'category' => [],
            'categories'  => Category::with('childrenCategories')->where('parent_id', '0')->get(),
            'delimiter' => ''
        ], compact('categories', 'posts_read', 'tags', 'user'));
    }
}
