<?php

namespace App\Http\Controllers\MarketingFaq;

use App\Http\Controllers\Controller;
use App\Models\LeftBanner;
use App\Models\Post;
use App\Models\MarketingFaq;
use App\Models\RightBanner;
use App\Models\UpperBanner;
use Illuminate\Support\Facades\Auth;

class IndexController extends Controller
{
    public function __invoke()
    {
        $upper_banner = UpperBanner::latest()->first();
        $faq_marketings = MarketingFaq::where('published', '1')->paginate(50);
        $posts_read = Post::query()->orderBy('views', 'desc')->where('published', '1')->paginate(6);
        $user = Auth::user();
        $right_banners = RightBanner::all()->where('published', '1');
        $left_banners = LeftBanner::all()->where('published', '1');
        return view('faq.faq_marketings.index', compact('faq_marketings', 'posts_read', 'user', 'right_banners', 'left_banners', 'upper_banner'));
    }
}
