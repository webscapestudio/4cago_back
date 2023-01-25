<?php

namespace App\Http\Controllers\Personal\Work;

use App\Http\Controllers\Controller;
use App\Models\LeftBanner;
use App\Models\Post;
use App\Models\RightBanner;
use App\Models\UpperBanner;
use App\Models\Work;


class ShowController extends Controller
{
    public function __invoke(Work $work)
    {
        $upper_banner = UpperBanner::latest()->first();
        $posts = Post::latest()->with('like')->paginate(6);
        $works = Work::all();
        $right_banners = RightBanner::all()->where('published', '1');
        $left_banners = LeftBanner::all()->where('published', '1');
        return view('personal.main.index', compact('work', 'works', 'posts', 'right_banners', 'left_banners', 'upper_banner'));
    }
}
