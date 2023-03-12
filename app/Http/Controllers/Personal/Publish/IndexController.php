<?php

namespace App\Http\Controllers\Personal\Publish;

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
        $posts = Post::where('published', '0')->where('user_id', $user->id)->get();
        $posts_read = Post::query()->orderBy('views', 'desc')->where('published', '1')->paginate(6);
        $advertisements = Advertisement::where('published', '0')->get();
        $right_banners = RightBanner::all()->where('published', '1');
        $left_banners = LeftBanner::all()->where('published', '1');
        return view('personal.published.index',  compact('user', 'posts', 'advertisements', 'posts_read', 'right_banners', 'left_banners', 'upper_banner'));
    }
}
