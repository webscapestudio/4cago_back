<?php

namespace App\Http\Controllers\Personal\Advertisement;

use App\Http\Controllers\Controller;
use App\Models\Advertisement;
use App\Models\LeftBanner;
use App\Models\Post;
use App\Models\RightBanner;
use App\Models\UpperBanner;
use Illuminate\Support\Facades\Auth;

class ShowController extends Controller
{
    public function __invoke(Advertisement $advertisement)
    {
        $upper_banner = UpperBanner::latest()->first();
        $user = Auth::user();
        $posts_read = Post::query()->orderBy('views', 'desc')->where('published', '1')->paginate(6);
        $advertisements = Advertisement::all();
        $right_banners = RightBanner::all()->where('published', '1');
        $left_banners = LeftBanner::all()->where('published', '1');
        return view('personal.advertisements.show', compact('advertisement', 'advertisements', 'posts_read', 'user', 'right_banners', 'left_banners', 'upper_banner'));
    }
}
