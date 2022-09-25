<?php

namespace App\Http\Controllers\Admin\Category;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Category;

class CreateController extends Controller
{
    public function __invoke()
    {
        $categories = Category::all();
        $categoriesParent = Category::where('parent_id',0)->get();
        return view('admin.categories.create', compact('categories','categoriesParent'));
    }

}
 