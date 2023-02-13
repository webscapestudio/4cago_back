<?php

namespace App\Http\Controllers\Categorywork\work;

use App\Http\Controllers\Controller;
use App\Models\Work;
use App\Models\Categorywork;
use App\Models\LeftBanner;
use App\Models\Post;
use App\Models\RightBanner;
use App\Models\Tag;
use App\Models\UpperBanner;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class IndexController extends Controller
{
    public function __invoke(Request $request, $category_workId = 0)
    {
        $upper_banner = UpperBanner::latest()->first();
        $posts_read = Post::query()->orderBy('views', 'desc')->where('published', '1')->paginate(6);
        $works = Work::latest();
        $categories_works = Categorywork::get();
        $work_cat = $request->route('categories_works');
        if ($category_workId) {
            $works->where('category_work_id', $category_workId);
        }
        $tags = Tag::all();
        $user = Auth::user();
        $right_banners = RightBanner::all()->where('published', '1');
        $left_banners = LeftBanner::all()->where('published', '1');
        return view('works.index', [
            'works' => $works->where('published', '1')->get(),
            'categories_works' => $categories_works->where('published', '1')
        ], compact('tags', 'user', 'posts_read', 'right_banners', 'left_banners', 'work_cat', 'upper_banner'));
    }
}
