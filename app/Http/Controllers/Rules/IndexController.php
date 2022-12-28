<?php

namespace App\Http\Controllers\Rules;

use App\Http\Controllers\Controller;
use App\Models\LeftBanner;
use App\Models\Post;
use App\Models\RightBanner;
use App\Models\Rules;
use Illuminate\Support\Facades\Auth;

class IndexController extends Controller
{
    public function __invoke()
    {
        $rules = Rules::where('published', '1')->paginate(50);
        $posts_read = Post::latest()->with('like')->where('published', '1')->paginate(6);
        $user = Auth::user();
        $right_banners = RightBanner::all()->where('published', '1');
        $left_banners = LeftBanner::all()->where('published', '1');
        return view('faq.rules.index', compact('rules', 'posts_read', 'user', 'right_banners', 'left_banners'));
    }
}
