<?php

namespace App\Http\Controllers\Personal\Post;

use App\Http\Controllers\Controller;
use App\Models\Comment;
use App\Models\LeftBanner;
use App\Models\Post;
use App\Models\RightBanner;
use App\Models\UpperBanner;
use Illuminate\Support\Facades\Auth;

class ShowController extends Controller
{
    public function __invoke($slug)
    {
        $upper_banner = UpperBanner::latest()->first();
        $post = Post::whereSlug($slug)->firstOrFail();
        $user = Auth::user();
        $posts_read = Post::query()->orderBy('views', 'desc')->where('published', '1')->paginate(6);
        $comments = Comment::all();
        $right_banners = RightBanner::all()->where('published', '1');
        $left_banners = LeftBanner::all()->where('published', '1');
        return view('personal.posts.show', compact('post', 'user', 'comments', 'posts_read', 'right_banners', 'left_banners', 'upper_banner'));
    }
}
