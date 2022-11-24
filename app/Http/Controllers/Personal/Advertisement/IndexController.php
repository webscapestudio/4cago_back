<?php

namespace App\Http\Controllers\Personal\Advertisement;

use App\Http\Controllers\Controller;
use App\Models\Advertisement;
use App\Models\CategoryAdvertisement;
use App\Models\Post;
use App\Models\Tag;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class IndexController extends Controller
{
    public function __invoke()
    {
        $user = Auth::user();
        $posts = Post::latest()->with('like')->paginate(6);
        $advertisements = User::find($user->id)->advertisements;
        $categories = CategoryAdvertisement::all();
        $tags = Tag::all();
        return view('personal.advertisements.index', compact('advertisements', 'user', 'posts'));
    }
}
