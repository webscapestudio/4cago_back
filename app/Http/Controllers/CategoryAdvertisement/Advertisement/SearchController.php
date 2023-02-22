<?php

namespace App\Http\Controllers\CategoryAdvertisement\Advertisement;

use App\Http\Controllers\Controller;
use App\Models\LeftBanner;
use App\Models\Advertisement;
use App\Models\CategoryAdvertisement;
use App\Models\RightBanner;
use Illuminate\Http\Request;
use App\Models\Post;
use App\Models\UpperBanner;
use Illuminate\Support\Facades\Auth;

class SearchController extends Controller
{
    public function __invoke(Request $request)
    {

        if ($search = $request->sort == 'date') :
            $advertisements = Advertisement::query()->orderBy('created_at', 'desc')->where('published', '1')->get();
        endif;
        if ($search = $request->sort == 'views') :
            $advertisements = Advertisement::query()->orderBy('views', 'desc')->where('published', '1')->get();

        endif;
        if ($search = $request->sort == 'like') :
            $advertisements = Advertisement::withCount('like')->orderByDesc('like_count')->get();
        endif;
        if ($search = $request->search) :
            $advertisements = Advertisement::query()
                ->where('id', 'LIKE', "%{$search}%")
                ->orWhere('title', 'LIKE', "%{$search}%")
                ->orWhere('content', 'LIKE', "%{$search}%")
                ->get();
        endif;
        return view('advertisements.post_card', compact('advertisements'));
    }
}
