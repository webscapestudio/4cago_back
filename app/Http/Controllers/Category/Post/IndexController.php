<?php

namespace App\Http\Controllers\Category\Post;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\LeftBanner;
use App\Models\Post;
use App\Models\RightBanner;
use App\Models\Tag;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class IndexController extends Controller
{
    public function __invoke($categoryId = 0)
    {
        $posts_read = Post::latest()->with('like')->where('published', '1')->paginate(6);
        $posts = Post::latest();
        $categories = Category::get();
        if ($categoryId) {
            $posts->where('category_id', $categoryId);
        }
        $tags = Tag::all();
        $user = Auth::user();
        $right_banners = RightBanner::all()->where('published', '1');
        $left_banners = LeftBanner::all()->where('published', '1');
        return view('posts.index', [
            'posts' => $posts->where('published', '1')->get(),
            'categories' => $categories->where('published', '1')
        ], compact('tags', 'user', 'posts_read', 'right_banners', 'left_banners'));
    }
}
