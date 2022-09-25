<?php

namespace App\Http\Controllers\Admin\Category;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Request;

class IndexController extends Controller
{   public function __invoke()
    {
        $categories = Category::where('parent_id',0)->get();

        return view('admin.categories.index', compact('categories'));
    }


}
