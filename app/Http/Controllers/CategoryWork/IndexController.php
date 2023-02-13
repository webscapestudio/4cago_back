<?php

namespace App\Http\Controllers\CategoryWork;

use App\Http\Controllers\Controller;
use App\Models\CategoryWork;
use App\Models\Work;
use App\Models\LeftBanner;
use App\Models\Post;
use App\Models\RightBanner;
use App\Models\UpperBanner;
use Illuminate\Support\Facades\Auth;

class IndexController extends Controller
{
    public function __invoke()
    {
        $upper_banner = UpperBanner::latest()->first();
        $categories_work = CategoryWork::where('parent_id',  0)->where('published', '1')->with('childrenCategories')->get();
        $user = Auth::user();
        $posts_read = Post::query()->orderBy('views', 'desc')->where('published', '1')->paginate(6);
        $right_banners = RightBanner::all()->where('published', '1');
        $left_banners = LeftBanner::all()->where('published', '1');
        return view('categories_works.index', compact('categories_work', 'user', 'posts_read', 'right_banners', 'left_banners', 'upper_banner'));
    }
}
