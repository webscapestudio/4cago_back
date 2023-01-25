<?php

namespace App\Http\Controllers\News;

use App\Http\Controllers\Controller;
use App\Models\LeftBanner;
use App\Models\News;
use App\Models\Post;
use App\Models\RightBanner;
use App\Models\UpperBanner;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class SearchController extends Controller
{
    public function __invoke(Request $request)
    {
        $upper_banner = UpperBanner::latest()->first();
        $posts_read = Post::query()->orderBy('views', 'desc')->where('published', '1')->paginate(6);
        $user = Auth::user();
        $news = News::where('published', '1')->paginate(6);
        $right_banners = RightBanner::all()->where('published', '1');
        $left_banners = LeftBanner::all()->where('published', '1');
        $user = Auth::user();
        if ($search = $request->sort == 'date') :
            $news = News::query()->orderBy('created_at', 'desc')->where('published', '1')->get();
        endif;
        if ($search = $request->sort == 'views') :
            $news = News::query()->orderBy('views', 'desc')->where('published', '1')->get();
        endif;
        if ($search = $request->sort == 'like') :
            $news = News::withCount('like')->orderByDesc('like_count')->get();
        endif;
        if ($search = $request->s) :
            $news = News::query()
                ->where('id', 'LIKE', "%{$search}%")
                ->orWhere('title', 'LIKE', "%{$search}%")
                ->orWhere('description', 'LIKE', "%{$search}%")
                ->orWhere('content', 'LIKE', "%{$search}%")
                ->get();
        endif;

        return view('news.index', compact('news', 'user', 'posts_read', 'right_banners', 'left_banners', 'upper_banner'));
    }
}
