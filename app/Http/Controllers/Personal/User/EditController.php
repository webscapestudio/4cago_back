<?php

namespace App\Http\Controllers\Personal\User;

use App\Http\Controllers\Controller;
use App\Models\LeftBanner;
use App\Models\Post;
use App\Models\RightBanner;
use App\Models\UpperBanner;
use App\Models\User;
use Illuminate\Http\Request;

class EditController extends Controller
{
    public function __invoke(User $user)
    {
        $upper_banner = UpperBanner::latest()->first();
        $posts_read = Post::query()->orderBy('views', 'desc')->where('published', '1')->paginate(6);
        $right_banners = RightBanner::all()->where('published', '1');
        $left_banners = LeftBanner::all()->where('published', '1');
        return view('personal.users.profile_settings', compact('user', 'posts_read', 'right_banners', 'left_banners', 'upper_banner'));
    }
}
