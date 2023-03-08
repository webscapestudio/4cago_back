<?php

namespace App\Http\Controllers\Admin\Post;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ShowController extends Controller
{
    public function __invoke($slug)
    {
        $post = Post::whereSlug($slug)->firstOrFail();
        $user = Auth::user();
        return view('admin.posts.show', compact('post', 'user'));
    }
}
