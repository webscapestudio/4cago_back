<?php

namespace App\Http\Controllers\Admin\Category;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Category;
class EditController extends Controller
{
    public function __invoke(Category $category)
    {
        {
   
            return view('admin.categories.edit', [
                'category' => $category,
                'categories'  => Category::with('childrenCategories')->where('parent_id','0')->get(),
                'delimiter' => ''
            ]);
        }
    }

}
