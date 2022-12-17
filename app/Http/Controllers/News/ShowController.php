<?php

namespace App\Http\Controllers\News;

use App\Http\Controllers\Controller;

use App\Models\News;
use App\Models\Post;
use Illuminate\Support\Facades\Auth;

class ShowController extends Controller
{
    public function __invoke(News $news)
    {
        $posts_read = Post::latest()->with('like')->where('published', '1')->paginate(6);
        $user = Auth::user();
        return view('news.show', compact('news', 'user', 'posts_read'));
    }
}
