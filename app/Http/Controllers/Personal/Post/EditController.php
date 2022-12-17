<?php

namespace App\Http\Controllers\Personal\Post;

use App\Http\Controllers\Controller;
use App\Models\Post;
use App\Models\Category;
use App\Models\Tag;
use Illuminate\Support\Facades\Auth;

class EditController extends Controller
{
    public function __invoke(Post $post, Category $category)
    {
        $posts_read = Post::latest()->with('like')->where('published', '1')->paginate(6);
        $user = Auth::user();
        $posts = Post::all();
        $categories = Category::all();
        $tags = Tag::all();
        return view('personal.posts.edit', [
            'category' => $category,
            'categories'  => Category::with('childrenCategories')->where('parent_id', '0')->get(),
            'delimiter' => ''
        ], compact('categories', 'posts_read', 'post', 'tags', 'user'));
    }
}
