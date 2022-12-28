<?php

namespace App\Http\Controllers\Personal\Favourite;

use App\Http\Controllers\Controller;
use App\Models\Advertisement;
use App\Models\LeftBanner;
use App\Models\News;
use App\Models\Post;
use App\Models\RightBanner;
use Illuminate\Support\Facades\Auth;

class IndexController extends Controller
{
    public function __invoke()
    {

        $user = Auth::user();
        $posts_read = Post::latest()->with('like')->where('published', '1')->paginate(6);
        $posts = Post::whereHas('favourite', function ($query) {
            $query->where('user_id', Auth::id())
                ->where('favouritable_type', Post::class)->where('published', '1');
        })->get();
        $advertisements = Advertisement::whereHas('favourite', function ($query) {
            $query->where('user_id', Auth::id())
                ->where('favouritable_type', Advertisement::class)->where('published', '1');
        })->get();

        $news = News::whereHas('favourite', function ($query) {
            $query->where('user_id', Auth::id())
                ->where('favouritable_type', News::class)->where('published', '1');
        })->get();
        $right_banners = RightBanner::all()->where('published', '1');
        $left_banners = LeftBanner::all()->where('published', '1');
        return view('personal.favourites.index',  compact('user', 'posts', 'advertisements', 'news', 'posts_read', 'right_banners', 'left_banners'));
    }
}
