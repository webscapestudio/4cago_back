<?php

namespace App\Http\Controllers\Personal\Advertisement;

use App\Http\Controllers\Controller;
use App\Models\CategoryAdvertisement;
use App\Models\Tag;
use App\Models\Advertisement;
use App\Models\Post;
use Illuminate\Support\Facades\Auth;

class CreateController extends Controller
{
    public function __invoke()
    {
        $posts_read = Post::latest()->with('like')->where('published', '1')->paginate(6);
        $advertisements = Advertisement::all();
        $categories_advertisements = CategoryAdvertisement::all();
        $tags = Tag::all();
        $user = Auth::user();
        //dd($user);
        return view('personal.advertisements.create', [
            'category_advertisement' => [],
            'categories_advertisements'  => CategoryAdvertisement::with('childrenCategories')->where('parent_id', '0')->get(),
            'delimiter' => ''
        ], compact('categories_advertisements', 'advertisements', 'tags', 'user', 'posts_read'));
    }
}
