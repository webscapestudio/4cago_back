<?php

namespace App\Http\Controllers\Personal\Work;

use App\Http\Controllers\Controller;
use App\Models\LeftBanner;
use App\Models\Post;
use App\Models\RightBanner;
use App\Models\UpperBanner;
use App\Models\Work;
use Illuminate\Support\Facades\Auth;

class ShowController extends Controller
{
    public function __invoke($work_id)
    {
        $upper_banner = UpperBanner::latest()->first();
        $work = Work::find($work_id);
        $user = Auth::user();
        $posts_read = Post::query()->orderBy('views', 'desc')->where('published', '1')->paginate(6);
        $right_banners = RightBanner::all()->where('published', '1');
        $left_banners = LeftBanner::all()->where('published', '1');
        return view('personal.works.show', compact('work', 'user', 'posts_read', 'right_banners', 'left_banners', 'upper_banner'));
    }
}
