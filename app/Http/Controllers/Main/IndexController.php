<?php

namespace App\Http\Controllers\Main;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\LeftBanner;
use App\Models\Post;
use App\Models\RightBanner;
use App\Models\Tag;
use App\Models\UpperBanner;
use Illuminate\Support\Facades\Auth;

class IndexController extends Controller
{
    public function __invoke(Request $request)
    {
        $upper_banner = UpperBanner::latest()->first();
        $posts_read = Post::query()->orderBy('views', 'desc')->where('published', '1')->paginate(6);
        $posts = Post::withCount('comments')
            ->orderBy('comments_count', 'desc')
            ->where('published', '1')
            ->paginate(6);
        $tags = Tag::all();
        $user = Auth::user();
        $right_banners = RightBanner::all()->where('published', '1');
        $left_banners = LeftBanner::all()->where('published', '1');
        if ($request->ajax()) {
            return view('main.post_card', compact('posts'));
        }
        $last_page = $posts->lastPage();
        return view('main.index', compact('last_page', 'tags', 'user', 'posts_read', 'right_banners', 'left_banners', 'upper_banner'));
    }
}
