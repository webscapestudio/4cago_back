<?php

namespace App\Http\Controllers\Personal\User;

use App\Http\Controllers\Controller;
use App\Models\Post;
use App\Models\User;
use Illuminate\Http\Request;

class ShowController extends Controller
{
    public function __invoke(User $user)
    {
        $posts = Post::latest()->with('like')->paginate(6);
        return view('personal.users.profile_settings', compact('user', 'posts'));
    }
}
