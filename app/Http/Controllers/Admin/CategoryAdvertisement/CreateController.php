<?php

namespace App\Http\Controllers\Admin\CategoryAdvertisement;

use App\Http\Controllers\Controller;
use App\Models\CategoryAdvertisement;


class CreateController extends Controller
{
    public function __invoke()
    {

        return view('admin.categories_advertisements.create', [
            'category' => [],
            'categories'  => CategoryAdvertisement::with('childrenCategories')->where('parent_id', '0')->get(),
            'delimiter' => ''
        ]);
    }
}
