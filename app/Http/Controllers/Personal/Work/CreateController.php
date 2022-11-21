<?php

namespace App\Http\Controllers\Personal\Work;

use App\Http\Controllers\Controller;
use App\Models\CategoryWork;
use App\Models\Work;
use Illuminate\Support\Facades\Auth;

class CreateController extends Controller
{
    public function __invoke()
    {
        $works = Work::all();
        $categories_works = CategoryWork::all();
        $user = Auth::user();
        return view('personal.works.create', [
            'category_work' => [],
            'categories_works'  => CategoryWork::with('childrenCategories')->where('parent_id', '0')->get(),
            'delimiter' => ''
        ], compact('categories_works', 'works', 'user'));
    }
}
