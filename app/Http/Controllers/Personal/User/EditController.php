<?php

namespace App\Http\Controllers\Personal\User;

use App\Http\Controllers\Controller;
use App\Models\Post;
use App\Models\User;
use Illuminate\Http\Request;

class EditController extends Controller
{
    public function __invoke(User $user)
    {
        $posts_read = Post::latest()->with('like')->where('published', '1')->paginate(6);
        return view('personal.users.profile_settings', compact('user', 'posts_read'));
    }
}
