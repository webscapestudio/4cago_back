<?php

namespace App\Http\Controllers\CategoryAdvertisement\Advertisement;

use App\Http\Controllers\Controller;
use App\Models\LeftBanner;
use App\Models\Advertisement;
use App\Models\CategoryAdvertisement;
use App\Models\RightBanner;
use Illuminate\Http\Request;
use App\Models\Post;
use Illuminate\Support\Facades\Auth;

class SearchController extends Controller
{
    public function __invoke(Request $request, $category_advertisementId = 0)
    {
        $posts_read = Post::query()->orderBy('views', 'desc')->where('published', '1')->paginate(6);
        $right_banners = RightBanner::all()->where('published', '1');
        $left_banners = LeftBanner::all()->where('published', '1');
        $advertisements = Advertisement::where('published', '1')->get();
        $user = Auth::user();
        $categories_advertisements = CategoryAdvertisement::get();
        $advertisement_cat = $request->route('categories_advertisements');
        if ($category_advertisementId) {
            $advertisements->where('category_advertisement_id', $category_advertisementId);
        }
        if ($search = $request->sort == 'date') :
            $advertisements = Advertisement::query()->orderBy('created_at', 'desc')->where('published', '1')->get();
        endif;
        if ($search = $request->sort == 'views') :
            $advertisements = Advertisement::query()->orderBy('views', 'desc')->where('published', '1')->get();

        endif;
        if ($search = $request->sort == 'like') :
            $advertisements = Advertisement::withCount('like')->orderByDesc('like_count')->get();
        endif;
        if ($search = $request->s) :
            $advertisements = Advertisement::query()
                ->where('id', 'LIKE', "%{$search}%")
                ->orWhere('title', 'LIKE', "%{$search}%")
                ->orWhere('content', 'LIKE', "%{$search}%")
                ->get();
        endif;
        return view('advertisements.index', [
            'advertisements' => $advertisements,
            'categories_advertisements' => $categories_advertisements->where('published', '1')
        ], compact('advertisement_cat', 'user', 'posts_read', 'right_banners', 'left_banners'));
    }
}
