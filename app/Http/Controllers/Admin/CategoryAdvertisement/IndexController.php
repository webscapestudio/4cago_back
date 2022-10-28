<?php

namespace App\Http\Controllers\Admin\CategoryAdvertisement;

use App\Http\Controllers\Controller;
use App\Models\CategoryAdvertisement;
use Illuminate\Http\Request;

class IndexController extends Controller
{
    public function __invoke()
    {
        $categories_advertisements = CategoryAdvertisement::all();
        return view('admin.categories_advertisements.index', compact('categories_advertisements'));
    }
}
