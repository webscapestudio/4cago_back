<?php

namespace App\Http\Controllers\News;

use App\Http\Controllers\Controller;
use App\Models\LeftBanner;
use App\Models\News;
use App\Models\Post;
use App\Models\RightBanner;
use Illuminate\Support\Facades\Auth;

class ShowController extends Controller
{
    public function __invoke(News $news)
    {
        $right_banners = RightBanner::all()->where('published', '1');
        $posts_read = Post::latest()->with('like')->where('published', '1')->paginate(6);
        $user = Auth::user();
        $news->increment('views');
        $left_banners = LeftBanner::all()->where('published', '1');
        return view('news.show', compact('news', 'user', 'posts_read', 'right_banners', 'left_banners'));
    }
}
