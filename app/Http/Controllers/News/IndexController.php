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

class IndexController extends Controller
{
  public function __invoke(Request $request)
  {
    $upper_banner = UpperBanner::latest()->first();
    $posts_read = Post::query()->orderBy('views', 'desc')->where('published', '1')->paginate(6);
    $user = Auth::user();
    $news_all = News::where('published', '1')->paginate(6);

    if ($request->ajax()) {
      return view('news.post_card', compact('news_all'));
    }

    $right_banners = RightBanner::all()->where('published', '1');
    $left_banners = LeftBanner::all()->where('published', '1');
    return view('news.index', compact('user', 'posts_read', 'right_banners', 'left_banners', 'upper_banner', 'news_all'));
  }
}
