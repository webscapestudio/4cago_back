<?php

namespace App\Http\Controllers\Admin\CategoryAdvertisement;

use App\Http\Controllers\Controller;
use App\Models\CategoryAdvertisement;
use Illuminate\Http\Request;

class ShowController extends Controller
{
    public function __invoke(CategoryAdvertisement $category_advertisement)
    {

        return view('admin.categories_advertisements.show', compact('category_advertisement'));
    }
}
