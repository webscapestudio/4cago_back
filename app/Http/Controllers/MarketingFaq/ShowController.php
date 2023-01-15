<?php

namespace App\Http\Controllers\MarketingFaq;

use App\Http\Controllers\Controller;
use App\Models\LeftBanner;
use App\Models\Post;
use App\Models\MarketingFaq;
use App\Models\RightBanner;
use Illuminate\Support\Facades\Auth;

class ShowController extends Controller
{
    public function __invoke($faq_marketing_id)
    {

        $faq_marketing = MarketingFaq::find($faq_marketing_id);
        $posts_read = Post::query()->orderBy('views', 'desc')->where('published', '1')->paginate(6);
        $user = Auth::user();
        $right_banners = RightBanner::all()->where('published', '1');
        $left_banners = LeftBanner::all()->where('published', '1');
        return view('faq.faq_marketings.show', compact('faq_marketing', 'posts_read', 'user', 'right_banners', 'left_banners'));
    }
}
