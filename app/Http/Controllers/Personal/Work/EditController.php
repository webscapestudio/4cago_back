<?php

namespace App\Http\Controllers\Personal\Work;

use App\Http\Controllers\Controller;
use App\Models\Work;
use App\Models\CategoryWork;
use App\Models\Post;
use Illuminate\Support\Facades\Auth;

class EditController extends Controller
{
    public function __invoke(Work $work, CategoryWork $category_work)
    {
        $posts = Post::latest()->with('like')->paginate(6);
        $user = Auth::user();
        $works = Work::all();
        $categories_works = CategoryWork::all();
        return view('personal.works.edit', [
            'category_work' => $category_work,
            'categories_works'  => CategoryWork::with('childrenCategories')->where('parent_id', '0')->get(),
            'delimiter' => ''
        ], compact('categories_works', 'works', 'work', 'user', 'posts'));
    }
}
