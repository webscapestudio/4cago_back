<?php

namespace App\Http\Controllers\Personal\Advertisement;

use App\Http\Controllers\Controller;
use App\Models\Advertisement;
use App\Models\Post;
use App\Models\RightBanner;
use Illuminate\Support\Facades\Auth;

class ShowController extends Controller
{
    public function __invoke(Advertisement $advertisement)
    {
        $user = Auth::user();
        $posts_read = Post::latest()->with('like')->where('published', '1')->paginate(6);
        $advertisements = Advertisement::all();
        $right_banners = RightBanner::all()->where('published', '1');
        return view('personal.advertisements.show', compact('advertisement', 'advertisements', 'posts_read', 'user', 'right_banners'));
    }
}
