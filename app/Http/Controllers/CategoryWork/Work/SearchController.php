<?php

namespace App\Http\Controllers\CategoryWork\Work;

use App\Http\Controllers\Controller;
use App\Models\LeftBanner;
use App\Models\Work;
use App\Models\CategoryWork;
use App\Models\RightBanner;
use Illuminate\Http\Request;
use App\Models\Post;
use App\Models\UpperBanner;
use Illuminate\Support\Facades\Auth;

class SearchController extends Controller
{
    public function __invoke(Request $request, $category_workId = 0)
    {
        $upper_banner = UpperBanner::latest()->first();
        $posts_read = Post::query()->orderBy('views', 'desc')->where('published', '1')->paginate(6);
        $right_banners = RightBanner::all()->where('published', '1');
        $left_banners = LeftBanner::all()->where('published', '1');
        $works = Work::where('published', '1')->get();
        $user = Auth::user();
        $categories_works = CategoryWork::get();
        $work_cat = $request->route('categories_works');
        if ($category_workId) {
            $works->where('category_work_id', $category_workId);
        }
        if ($search = $request->sort == 'date') :
            $works = Work::query()->orderBy('created_at', 'desc')->where('published', '1')->get();
        endif;
        if ($search = $request->sort == 'views') :
            $works = Work::query()->orderBy('views', 'desc')->where('published', '1')->get();

        endif;
        if ($search = $request->sort == 'like') :
            $works = Work::withCount('like')->orderByDesc('like_count')->get();
        endif;
        if ($search = $request->s) :
            $works = Work::query()
                ->where('id', 'LIKE', "%{$search}%")
                ->orWhere('title', 'LIKE', "%{$search}%")
                ->orWhere('content', 'LIKE', "%{$search}%")
                ->get();
        endif;
        return view('works.index', [
            'works' => $works,
            'categories_works' => $categories_works->where('published', '1')
        ], compact('work_cat', 'user', 'posts_read', 'right_banners', 'left_banners', 'upper_banner'));
    }
}
