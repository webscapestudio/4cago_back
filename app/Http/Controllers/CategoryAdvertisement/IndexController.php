<?php

namespace App\Http\Controllers\CategoryAdvertisement;

use App\Http\Controllers\Controller;
use App\Models\CategoryAdvertisement;
use App\Models\Advertisement;
use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class IndexController extends Controller
{
    public function __invoke()
    {
        $categories_advertisement = CategoryAdvertisement::where('parent_id',  0)->where('published', '1')->get();
        $user = Auth::user();
        $advertisement = Advertisement::latest()->with('like')->where('published', '1')->paginate(6);
        $posts_read = Post::latest()->with('like')->where('published', '1')->paginate(6);
        return view('categories_advertisements.index', compact('categories_advertisement', 'user', 'advertisement', 'posts_read'));
    }
}
