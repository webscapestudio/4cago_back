<?php

namespace App\Http\Controllers\Admin\CategoryWork;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\CategoryWork;

class EditController extends Controller
{
    public function __invoke(CategoryWork $category_work)
    { {

            return view('admin.categories_works.edit', [
                'category_work' => $category_work,
                'categories_works'  => CategoryWork::with('childrenCategories')->where('parent_id', '0')->get(),
                'delimiter' => ''
            ]);
        }
    }
}
