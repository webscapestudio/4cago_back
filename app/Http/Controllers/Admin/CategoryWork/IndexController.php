<?php

namespace App\Http\Controllers\Admin\CategoryWork;

use App\Http\Controllers\Controller;
use App\Models\CategoryWork;


class IndexController extends Controller
{
    public function __invoke()
    {
        $categories_works = CategoryWork::all();
        return view('admin.categories_works.index', compact('categories_works'));
    }
}
