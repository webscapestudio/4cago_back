<?php

namespace App\Http\Controllers\Admin\CategoryAdvertisement;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\CategoryAdvertisement;

class EditController extends Controller
{
    public function __invoke(CategoryAdvertisement $category_advertisement)
    { {

            return view('admin.categories_advertisements.edit', [
                'category_advertisement' => $category_advertisement,
                'categories_advertisements'  => CategoryAdvertisement::with('childrenCategories')->where('parent_id', '0')->get(),
                'delimiter' => ''
            ]);
        }
    }
}
