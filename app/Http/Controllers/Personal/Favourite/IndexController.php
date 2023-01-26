<?php

namespace App\Http\Controllers\Personal\Favourite;

use App\Http\Controllers\Controller;
use App\Models\Advertisement;
use App\Models\LeftBanner;
use App\Models\News;
use App\Models\Post;
use App\Models\RightBanner;
use App\Models\UpperBanner;
use Illuminate\Support\Facades\Auth;

class IndexController extends Controller
{
    public function __invoke()
    {
        $upper_banner = UpperBanner::latest()->first();
        $user = Auth::user();
        $posts_read = Post::query()->orderBy('views', 'desc')->where('published', '1')->paginate(6);
        $posts = Post::whereHas('favourite', function ($query) {
            $query->where('user_id', Auth::id())
                ->where('favouritable_type', Post::class)->where('published', '1');
        })->get();
        $advertisements = Advertisement::whereHas('favourite', function ($query) {
            $query->where('user_id', Auth::id())
                ->where('favouritable_type', Advertisement::class)->where('published', '1');
        })->get();

        $news_all = News::whereHas('favourite', function ($query) {
            $query->where('user_id', Auth::id())
                ->where('favouritable_type', News::class)->where('published', '1');
        })->get();
        $right_banners = RightBanner::all()->where('published', '1');
        $left_banners = LeftBanner::all()->where('published', '1');
        return view('personal.favourites.index',  compact('user', 'posts', 'advertisements', 'news_all', 'posts_read', 'right_banners', 'left_banners', 'upper_banner'));
    }
}
