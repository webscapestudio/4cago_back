<?php

namespace App\Http\Controllers\Category\Post;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\LeftBanner;
use App\Models\Post;
use App\Models\RightBanner;
use App\Models\Tag;
use App\Models\UpperBanner;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class IndexController extends Controller
{
    public function __invoke(Request $request, $categoryId = 0)
    {
        $upper_banner = UpperBanner::latest()->first();
        $posts_read = Post::query()->orderBy('views', 'desc')->where('published', '1')->paginate(6);
        $posts = Post::latest();
        $categories = Category::get();
        if ($categoryId) {
            $posts->where('category_id', $categoryId);
        }
        $tags = Tag::all();
        $user = Auth::user();
        $right_banners = RightBanner::all()->where('published', '1');
        $left_banners = LeftBanner::all()->where('published', '1');
        $post_cat = $request->route('category');
        if ($request->ajax()) {
            return view('posts.post_card', [
                'posts' => $posts->where('published', '1')->paginate(6),
                'categories' => $categories->where('published', '1')
            ], compact('posts'));
        }

        return view('posts.index', compact('tags', 'user', 'posts_read', 'right_banners', 'left_banners', 'post_cat', 'upper_banner'));
    }
}
