<?php

namespace App\Http\Controllers\Personal\Work;

use App\Http\Controllers\Controller;
use App\Models\Work;
use App\Models\CategoryWork;
use App\Models\LeftBanner;
use App\Models\Post;
use App\Models\RightBanner;
use Illuminate\Support\Facades\Auth;

class EditController extends Controller
{
    public function __invoke(Work $work, CategoryWork $category_work)
    {
        $posts_read = Post::query()->orderBy('views', 'desc')->where('published', '1')->paginate(6);
        $user = Auth::user();
        $works = Work::all();
        $categories_works = CategoryWork::all();
        $right_banners = RightBanner::all()->where('published', '1');
        $left_banners = LeftBanner::all()->where('published', '1');
        return view('personal.works.edit', [
            'category_work' => $category_work,
            'categories_works'  => CategoryWork::with('childrenCategories')->where('parent_id', '0')->get(),
            'delimiter' => ''
        ], compact('categories_works', 'works', 'work', 'user', 'posts_read', 'right_banners', 'left_banners'));
    }
}
