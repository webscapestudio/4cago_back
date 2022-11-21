<?php

namespace App\Http\Controllers\Admin\CategoryWork;

use App\Http\Controllers\Controller;
use App\Models\CategoryWork;
use Illuminate\Http\Request;

class ShowController extends Controller
{
    public function __invoke(CategoryWork $category_work)
    {

        return view('admin.categories_works.show', compact('category_work'));
    }
}
