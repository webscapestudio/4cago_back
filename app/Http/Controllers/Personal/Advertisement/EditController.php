<?php

namespace App\Http\Controllers\Personal\Advertisement;

use App\Http\Controllers\Controller;
use App\Models\Advertisement;
use App\Models\CategoryAdvertisement;
use App\Models\Tag;
use Illuminate\Support\Facades\Auth;

class EditController extends Controller
{
    public function __invoke(Advertisement $advertisement, CategoryAdvertisement $category_advertisement)
    {
        $user = Auth::user();
        $advertisements = Advertisement::all();
        $categories_advertisements = CategoryAdvertisement::all();
        $tags = Tag::all();
        return view('personal.advertisements.edit', [
            'category_advertisement' => $category_advertisement,
            'categories_advertisements'  => CategoryAdvertisement::with('childrenCategories')->where('parent_id', '0')->get(),
            'delimiter' => ''
        ], compact('categories_advertisements', 'advertisements', 'advertisement', 'tags', 'user'));
    }
}
