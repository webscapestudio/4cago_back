<?php

namespace App\Http\Controllers\Category;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\LeftBanner;
use App\Models\Post;
use App\Models\RightBanner;
use App\Models\UpperBanner;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class IndexController extends Controller
{
    public function __invoke()
    {
        $upper_banner = UpperBanner::latest()->first();
        $categories = Category::where('parent_id',  0)->where('published', '1')->with('childrenCategories')->get();
        $user = Auth::user();
        $posts_read = Post::query()->orderBy('views', 'desc')->where('published', '1')->paginate(6);
        $right_banners = RightBanner::all()->where('published', '1');
        $left_banners = LeftBanner::all()->where('published', '1');
        return view('categories_posts.index', compact('categories', 'user', 'posts_read', 'right_banners', 'left_banners', 'upper_banner'));
    }
}
