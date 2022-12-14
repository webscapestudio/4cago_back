<?php

namespace App\Http\Controllers\Category\Post;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Comment;
use App\Models\LeftBanner;
use App\Models\RightBanner;

class ShowController extends Controller
{
    public function __invoke($category_id, $post_id)
    {
        $posts_read = Post::latest()->with('like')->where('published', '1')->paginate(6);
        $post = Post::find($post_id);
        $user = Auth::user();
        $posts = Post::latest()->with('like')->where('published', '1')->paginate(6);
        $comments = Comment::all();
        $post->increment('views');
        $right_banners = RightBanner::all()->where('published', '1');
        $left_banners = LeftBanner::all()->where('published', '1');
        return view('posts.show', compact('post', 'user', 'comments', 'posts', 'posts_read', 'right_banners', 'left_banners'));
    }
}
