<?php

namespace App\Http\Controllers\CategoryAdvertisement\Advertisement;

use App\Http\Controllers\Controller;
use App\Models\Advertisement;
use App\Models\CategoryAdvertisement;
use App\Models\LeftBanner;
use App\Models\Post;
use App\Models\RightBanner;
use App\Models\Tag;
use App\Models\UpperBanner;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class IndexController extends Controller
{
    public function __invoke(Request $request, $category_advertisementId = 0)
    {
        $upper_banner = UpperBanner::latest()->first();
        $posts_read = Post::query()->orderBy('views', 'desc')->where('published', '1')->paginate(6);
        $advertisements = Advertisement::latest();
        $categories_advertisements = CategoryAdvertisement::get();
        $advertisement_cat = $request->route('categories_advertisements');
        if ($category_advertisementId) {
            $advertisements->where('category_advertisement_id', $category_advertisementId);
        }
        $tags = Tag::all();
        $user = Auth::user();
        $right_banners = RightBanner::all()->where('published', '1');
        $left_banners = LeftBanner::all()->where('published', '1');
        if ($request->ajax()) {
            return view('advertisements.post_card', [
                'advertisements' => $advertisements->where('published', '1')->paginate(6),
                'categories_advertisements' => $categories_advertisements->where('published', '1')
            ], compact('advertisements'));
        }
        $last_page = Advertisement::latest()->where('published', '1')->paginate(6)->lastPage();
        return view('advertisements.index',  compact('last_page', 'tags', 'user', 'posts_read', 'right_banners', 'left_banners', 'advertisement_cat', 'upper_banner'));
    }
}
