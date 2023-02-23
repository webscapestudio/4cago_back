<?php

namespace App\Http\Controllers\Category\Post;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\LeftBanner;
use App\Models\News;
use App\Models\Post;
use App\Models\RightBanner;
use App\Models\UpperBanner;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class SearchController extends Controller
{
    public function __invoke(Request $request)
    {
        if ($search = $request->sort == 'date') :
            $posts = Post::query()->orderBy('created_at', 'desc')->where('published', '1')->get();
        endif;
        if ($search = $request->sort == 'views') :
            $posts = Post::query()->orderBy('views', 'desc')->where('published', '1')->get();

        endif;
        if ($search = $request->sort == 'like') :
            $posts = Post::withCount('like')->orderByDesc('like_count')->get();
        endif;
        if ($search = $request->search) :
            $posts = Post::query()
                ->where('id', 'LIKE', "%{$search}%")
                ->orWhere('title', 'LIKE', "%{$search}%")
                ->orWhere('description', 'LIKE', "%{$search}%")
                ->orWhere('content', 'LIKE', "%{$search}%")
                ->get();
            return view('posts.post_card', compact('posts'));
        endif;
    }
}
