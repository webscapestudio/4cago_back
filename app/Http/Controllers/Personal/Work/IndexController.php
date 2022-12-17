<?php

namespace App\Http\Controllers\Personal\Work;

use App\Http\Controllers\Controller;
use App\Models\Post;
use App\Models\Work;
use Illuminate\Support\Facades\Auth;

class IndexController extends Controller
{
    public function __invoke()
    {
        $posts_read = Post::latest()->with('like')->where('published', '1')->paginate(6);
        $works = Work::all();
        $user = Auth::user();
        return view('personal.works.index', compact('works', 'user', 'posts_read'));
    }
}
