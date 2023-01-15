<?php

namespace App\Http\Controllers\Personal\Post;

use App\Http\Controllers\Controller;
use App\Models\Post;
use App\Models\Category;
use App\Models\LeftBanner;
use App\Models\RightBanner;
use App\Models\Tag;
use Illuminate\Support\Facades\Auth;

class EditController extends Controller
{
    public function __invoke(Post $post, Category $category)
    {
        $posts_read = Post::query()->orderBy('views', 'desc')->where('published', '1')->paginate(6);
        $user = Auth::user();
        $categories = Category::with('childrenCategories')->where('parent_id', '>', '0')->get();
        $tags = Tag::all();
        $right_banners = RightBanner::all()->where('published', '1');
        $left_banners = LeftBanner::all()->where('published', '1');
        return view('personal.posts.edit', compact('categories', 'posts_read', 'post', 'tags', 'user', 'right_banners', 'left_banners'));
    }
}
