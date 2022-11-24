<?php

namespace App\Http\Controllers\Advertisement;

use App\Http\Controllers\Controller;

use App\Models\Advertisement;
use App\Models\Post;
use Illuminate\Support\Facades\Auth;

class ShowController extends Controller
{
    public function __invoke(Advertisement $advertisement)
    {
        $posts = Post::latest()->with('like')->paginate(6);
        $user = Auth::user();
        return view('advertisements.show', compact('advertisement', 'user', 'posts'));
    }
}
