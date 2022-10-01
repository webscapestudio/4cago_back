<?php

namespace App\Http\Controllers\Admin\Category;

use App\Http\Controllers\Controller;
use App\Models\Category;


class CreateController extends Controller
{
    public function __invoke()
    {
   
        return view('admin.categories.create', [
            'category' => [],
            'categories'  => Category::with('childrenCategories')->where('parent_id','0')->get(),
            'delimiter' => ''
        ]);
    }

}
 