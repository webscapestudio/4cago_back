<?php

namespace App\Http\Controllers\Personal\Advertisement;

use App\Http\Controllers\Controller;
use App\Models\CategoryAdvertisement;
use App\Models\Tag;
use App\Models\Advertisement;
use Illuminate\Support\Facades\Auth;

class CreateController extends Controller
{
    public function __invoke()
    {
        $advertisements = Advertisement::all();
        $categories_advertisements = CategoryAdvertisement::all();
        $tags = Tag::all();
        $user = Auth::user();
        //dd($user);
        return view('personal.advertisements.create', [
            'category' => [],
            'categories_advertisements'  => CategoryAdvertisement::with('childrenCategories')->where('parent_id', '0')->get(),
            'delimiter' => ''
        ], compact('categories_advertisements', 'advertisements', 'tags', 'user'));
    }
}
