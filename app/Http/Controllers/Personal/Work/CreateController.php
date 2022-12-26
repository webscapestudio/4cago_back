<?php

namespace App\Http\Controllers\Personal\Work;

use App\Http\Controllers\Controller;
use App\Models\CategoryWork;
use App\Models\Post;
use App\Models\RightBanner;
use App\Models\Work;
use Illuminate\Support\Facades\Auth;

class CreateController extends Controller
{
    public function __invoke()
    {
        $posts_read = Post::latest()->with('like')->where('published', '1')->paginate(6);
        $works = Work::all();
        $categories_works = CategoryWork::all();
        $user = Auth::user();
        $right_banners = RightBanner::all()->where('published', '1');
        return view('personal.works.create', [
            'category_work' => [],
            'categories_works'  => CategoryWork::with('childrenCategories')->where('parent_id', '0')->get(),
            'delimiter' => ''
        ], compact('categories_works', 'works', 'user', 'posts_read', 'right_banners'));
    }
}
