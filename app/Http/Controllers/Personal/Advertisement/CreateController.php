<?php

namespace App\Http\Controllers\Personal\Advertisement;

use App\Http\Controllers\Controller;
use App\Models\CategoryAdvertisement;
use App\Models\Tag;
use App\Models\Advertisement;
use App\Models\LeftBanner;
use App\Models\Post;
use App\Models\RightBanner;
use App\Models\UpperBanner;
use Illuminate\Support\Facades\Auth;

class CreateController extends Controller
{
    public function __invoke()
    {
        $upper_banner = UpperBanner::latest()->first();
        $posts_read = Post::query()->orderBy('views', 'desc')->where('published', '1')->paginate(6);
        $advertisements = Advertisement::all();
        $categories_advertisements = CategoryAdvertisement::with('childrenCategories')->get();
        $tags = Tag::all();
        $user = Auth::user();
        $right_banners = RightBanner::all()->where('published', '1');
        $left_banners = LeftBanner::all()->where('published', '1');
        return view('personal.advertisements.create', compact('categories_advertisements', 'advertisements', 'tags', 'user', 'posts_read', 'right_banners', 'left_banners', 'upper_banner'));
    }
}
