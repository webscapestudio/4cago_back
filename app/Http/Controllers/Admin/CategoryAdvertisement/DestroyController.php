<?php

namespace App\Http\Controllers\Admin\CategoryAdvertisement;

use App\Http\Controllers\Controller;
use App\Models\CategoryAdvertisement;
use Illuminate\Http\Request;

class DestroyController extends Controller
{
    public function __invoke(CategoryAdvertisement $category_advertisement)
    {
        $category_advertisement->delete();
        return redirect()->route('admin.category_advertisement.index');
    }
}
