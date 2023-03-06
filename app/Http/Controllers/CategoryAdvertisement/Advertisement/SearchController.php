<?php

namespace App\Http\Controllers\CategoryAdvertisement\Advertisement;

use App\Http\Controllers\Controller;
use App\Models\Advertisement;
use Illuminate\Http\Request;

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
            return view('advertisements.post_card', compact('advertisements'));
        endif;
    }
}
