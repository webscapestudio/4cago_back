<?php

namespace App\Http\Controllers\News;

use App\Http\Controllers\Controller;
use App\Models\News;
use App\Models\Post;
use Illuminate\Support\Facades\Auth;

class IndexController extends Controller
{
    public function __invoke()
    {
        $posts = Post::latest()->with('like')->paginate(6);
        $user = Auth::user();
        $news = News::latest()->with('like')->paginate(6);
        return view('news.index', compact('news', 'user', 'posts'));
    }
}
