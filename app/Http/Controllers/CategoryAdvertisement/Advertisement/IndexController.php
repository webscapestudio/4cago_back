<?php

namespace App\Http\Controllers\CategoryAdvertisement\Advertisement;

use App\Http\Controllers\Controller;
use App\Models\Advertisement;
use App\Models\CategoryAdvertisement;
use App\Models\LeftBanner;
use App\Models\Post;
use App\Models\RightBanner;
use App\Models\Tag;
use Illuminate\Support\Facades\Auth;

class IndexController extends Controller
{
    public function __invoke($category_advertisementId = 0)
    {
        $posts_read = Post::query()->orderBy('views', 'desc')->where('published', '1')->paginate(6);
        $advertisements = Advertisement::latest();
        $categories_advertisements = CategoryAdvertisement::get();
        if ($category_advertisementId) {
            $advertisements->where('category_advertisement_id', $category_advertisementId);
        }
        $tags = Tag::all();
        $user = Auth::user();
        $right_banners = RightBanner::all()->where('published', '1');
        $left_banners = LeftBanner::all()->where('published', '1');
        return view('advertisements.index', [
            'advertisements' => $advertisements->where('published', '1')->get(),
            'categories_advertisements' => $categories_advertisements->where('published', '1')
        ], compact('tags', 'user', 'posts_read', 'right_banners', 'left_banners'));
    }
}
