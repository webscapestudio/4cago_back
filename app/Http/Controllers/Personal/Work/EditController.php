<?php

namespace App\Http\Controllers\Personal\Work;

use App\Http\Controllers\Controller;
use App\Models\Work;
use App\Models\CategoryWork;
use App\Models\LeftBanner;
use App\Models\Post;
use App\Models\RightBanner;
use App\Models\Tag;
use App\Models\UpperBanner;
use Illuminate\Support\Facades\Auth;

class EditController extends Controller
{
    public function __invoke(Work $work, CategoryWork $category_work)
    {
        $upper_banner = UpperBanner::latest()->first();
        $posts_read = Post::query()->orderBy('views', 'desc')->where('published', '1')->paginate(6);
        $user = Auth::user();
        $works = Work::all();
        $tags = Tag::all();
        $categories_works = CategoryWork::all();
        $right_banners = RightBanner::all()->where('published', '1');
        $left_banners = LeftBanner::all()->where('published', '1');
        return view('personal.works.edit',  compact('categories_works', 'works', 'work', 'user', 'posts_read', 'right_banners', 'left_banners', 'upper_banner', 'tags'));
    }
}
