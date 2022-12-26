<?php

namespace App\Http\Controllers\CategoryHelp;

use App\Http\Controllers\Controller;
use App\Models\CategoryHelp;
use App\Models\Help;
use App\Models\LeftBanner;
use App\Models\Post;
use App\Models\RightBanner;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class IndexController extends Controller
{
    public function __invoke()
    {
        $user = Auth::user();
        $categories_asked_questions = CategoryHelp::all()->where('published', '1');
        $asked_questions = Help::all()->where('published', '1');
        $posts_read = Post::latest()->with('like')->where('published', '1')->paginate(6);
        $right_banners = RightBanner::all()->where('published', '1');
        $left_banners = LeftBanner::all()->where('published', '1');
        return view('faq.categories_asked_questions.index', compact('categories_asked_questions', 'posts_read', 'user', 'asked_questions', 'right_banners', 'left_banners'));
    }
}
