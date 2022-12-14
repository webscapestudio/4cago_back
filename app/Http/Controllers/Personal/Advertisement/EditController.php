<?php

namespace App\Http\Controllers\Personal\Advertisement;

use App\Http\Controllers\Controller;
use App\Models\Advertisement;
use App\Models\CategoryAdvertisement;
use App\Models\LeftBanner;
use App\Models\Post;
use App\Models\RightBanner;
use App\Models\Tag;
use Illuminate\Support\Facades\Auth;

class EditController extends Controller
{
    public function __invoke(Advertisement $advertisement, CategoryAdvertisement $category_advertisement)
    {
        $posts_read = Post::latest()->with('like')->where('published', '1')->paginate(6);
        $user = Auth::user();
        $advertisements = Advertisement::all();
        $categories_advertisements = CategoryAdvertisement::with('childrenCategories')->where('parent_id', '>', '0')->get();
        $tags = Tag::all();
        $right_banners = RightBanner::all()->where('published', '1');
        $left_banners = LeftBanner::all()->where('published', '1');
        return view('personal.advertisements.edit', compact('categories_advertisements', 'advertisements', 'advertisement', 'tags', 'user', 'posts_read', 'right_banners', 'left_banners'));
    }
}
