<?php

namespace App\Http\Controllers\Category\Post;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\LeftBanner;
use App\Models\News;
use App\Models\Post;
use App\Models\RightBanner;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class SearchController extends Controller
{
    public function __invoke(Request $request, $categoryId = 0)
    {
        $posts_read = Post::query()->orderBy('views', 'desc')->where('published', '1')->paginate(6);
        $user = Auth::user();
        $news = News::where('published', '1')->paginate(6);
        $right_banners = RightBanner::all()->where('published', '1');
        $left_banners = LeftBanner::all()->where('published', '1');
        $posts = Post::where('published', '1')->get();
        $user = Auth::user();
        $categories = Category::get();
        $post_cat = $request->route('category');
        if ($categoryId) {
            $posts->where('category_id', $categoryId);
        }
        if ($search = $request->sort == 'date') :
            $posts = Post::query()->orderBy('created_at', 'desc')->where('published', '1')->get();
        endif;
        if ($search = $request->sort == 'views') :
            $posts = Post::query()->orderBy('views', 'desc')->where('published', '1')->get();

        endif;
        if ($search = $request->sort == 'like') :
            $posts = Post::withCount('like')->orderByDesc('like_count')->get();
        endif;
        if ($search = $request->s) :
            $posts = Post::query()
                ->where('id', 'LIKE', "%{$search}%")
                ->orWhere('title', 'LIKE', "%{$search}%")
                ->orWhere('content', 'LIKE', "%{$search}%")
                ->get();
        endif;
        return view('posts.index', [
            'posts' => $posts,
            'categories' => $categories->where('published', '1')
        ], compact('post_cat', 'user', 'posts_read', 'right_banners', 'left_banners'));
    }
}
