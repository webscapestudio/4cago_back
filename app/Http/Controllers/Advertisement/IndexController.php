<?php

namespace App\Http\Controllers\Advertisement;

use App\Http\Controllers\Controller;
use App\Models\Advertisement;
use App\Models\Post;
use Illuminate\Support\Facades\Auth;

class IndexController extends Controller
{
    public function __invoke()
    {
        $posts = Post::latest()->with('like')->paginate(6);
        $user = Auth::user();
        $advertisements = Advertisement::latest()->with('like')->paginate(6);
        return view('advertisements.index', compact('advertisements', 'user', 'posts'));
    }
}
