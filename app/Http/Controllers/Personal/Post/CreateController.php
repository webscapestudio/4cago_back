<?php

namespace App\Http\Controllers\Personal\Post;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\LeftBanner;
use App\Models\Tag;
use App\Models\Post;
use App\Models\RightBanner;
use Illuminate\Support\Facades\Auth;

class CreateController extends Controller
{
    public function __invoke()
    {
        $posts_read = Post::latest()->with('like')->where('published', '1')->paginate(6);
        $categories = Category::with('childrenCategories')->where('parent_id', '>', '0')->get();
        $tags = Tag::all();
        $user = Auth::user();
        $right_banners = RightBanner::all()->where('published', '1');
        $left_banners = LeftBanner::all()->where('published', '1');

        return view('personal.posts.create', compact('categories', 'posts_read', 'tags', 'user', 'right_banners', 'left_banners'));
    }
}
