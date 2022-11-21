<?php

namespace App\Http\Controllers\Personal\Favourite;

use App\Http\Controllers\Controller;
use App\Models\Advertisement;
use App\Models\Post;
use Illuminate\Support\Facades\Auth;

class IndexController extends Controller
{
    public function __invoke()
    {
        $user = Auth::user();
        $posts = Post::whereHas('favourite', function ($query) {
            $query->where('user_id', Auth::id())
                ->where('favouritable_type', Post::class);
        })->get();
        $advertisements = Advertisement::whereHas('favourite', function ($query) {
            $query->where('user_id', Auth::id())
                ->where('favouritable_type', Advertisement::class);
        })->get();

        return view('personal.favourites.index',  compact('user', 'posts', 'advertisements'));
    }
}
