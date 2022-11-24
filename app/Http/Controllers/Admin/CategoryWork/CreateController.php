<?php

namespace App\Http\Controllers\Admin\CategoryWork;

use App\Http\Controllers\Controller;
use App\Models\CategoryWork;


class CreateController extends Controller
{
    public function __invoke()
    {

        return view('admin.categories_works.create', [
            'category_work' => [],
            'categories_works'  => CategoryWork::with('childrenCategories')->where('parent_id', '0')->get(),
            'delimiter' => ''
        ]);
    }
}
