<?php

namespace App\Http\Controllers\Personal\Work;

use App\Http\Controllers\Controller;
use App\Models\CategoryWork;
use App\Models\LeftBanner;
use App\Models\Post;
use App\Models\RightBanner;
use App\Models\Tag;
use App\Models\UpperBanner;
use App\Models\User;
use App\Models\Work;
use Illuminate\Support\Facades\Auth;

class IndexController extends Controller
{
    public function __invoke()
    {
        $upper_banner = UpperBanner::latest()->first();
        $user = Auth::user();
        $posts_read = Post::query()->orderBy('views', 'desc')->where('published', '1')->paginate(6);
        $works = User::find($user->id)->works->where('published', '1');
        $categories = CategoryWork::all();
        $tags = Tag::all();
        $right_banners = RightBanner::all()->where('published', '1');
        $left_banners = LeftBanner::all()->where('published', '1');
        return view('personal.works.index', compact('works', 'user', 'posts_read', 'right_banners', 'left_banners', 'upper_banner'));
    }
}
