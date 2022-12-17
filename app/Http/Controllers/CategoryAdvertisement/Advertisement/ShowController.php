<?php

namespace App\Http\Controllers\CategoryAdvertisement\Advertisement;

use App\Http\Controllers\Controller;

use App\Models\Advertisement;
use App\Models\Comment;
use App\Models\Post;
use Illuminate\Support\Facades\Auth;

class ShowController extends Controller
{
    public function __invoke($category_advertisement_id, $advertisement_id)
    {
        $advertisement = Advertisement::find($advertisement_id);
        $user = Auth::user();
        $posts_read = Post::latest()->with('like')->where('published', '1')->paginate(6);
        $comments = Comment::all();
        return view('advertisements.show', compact('advertisement', 'user', 'comments', 'posts_read'));
    }
}