<?php

namespace App\Http\Controllers\Admin\Category;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Request;

class ShowController extends Controller
{
    public function __invoke($category_slug)
    {
        $category = Category::whereSlug($category_slug)->firstOrFail();
        return view('admin.categories.show', compact('category'));
    }
}
