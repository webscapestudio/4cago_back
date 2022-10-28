<?php

namespace App\Http\Controllers\Admin\CategoryAdvertisement;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\CategoryAdvertisement;

class EditController extends Controller
{
    public function __invoke(CategoryAdvertisement $category)
    { {

            return view('admin.categories_advertisements.edit', [
                'category' => $category,
                'categories'  => CategoryAdvertisement::with('childrenCategories')->where('parent_id', '0')->get(),
                'delimiter' => ''
            ]);
        }
    }
}
