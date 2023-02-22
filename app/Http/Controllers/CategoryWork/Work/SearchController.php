<?php

namespace App\Http\Controllers\CategoryWork\Work;

use App\Http\Controllers\Controller;
use App\Models\LeftBanner;
use App\Models\Work;
use App\Models\CategoryWork;
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
            $works = Work::query()->orderBy('created_at', 'desc')->where('published', '1')->get();
        endif;
        if ($search = $request->sort == 'views') :
            $works = Work::query()->orderBy('views', 'desc')->where('published', '1')->get();

        endif;
        if ($search = $request->sort == 'like') :
            $works = Work::withCount('like')->orderByDesc('like_count')->get();
        endif;
        if ($search = $request->search) :
            $works = Work::query()
                ->where('id', 'LIKE', "%{$search}%")
                ->orWhere('title', 'LIKE', "%{$search}%")
                ->orWhere('description', 'LIKE', "%{$search}%")
                ->orWhere('content', 'LIKE', "%{$search}%")
                ->get();
        endif;
        return view('works.post_card', compact('works'));
    }
}
