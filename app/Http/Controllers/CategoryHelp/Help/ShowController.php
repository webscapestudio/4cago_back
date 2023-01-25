<?php

namespace App\Http\Controllers\CategoryHelp\Help;

use App\Http\Controllers\Controller;
use App\Models\Help;
use App\Models\CategoryHelp;
use App\Models\LeftBanner;
use App\Models\Post;
use App\Models\RightBanner;
use App\Models\UpperBanner;
use Illuminate\Support\Facades\Auth;

class ShowController extends Controller
{
    public function __invoke($categories_asked_questions_id, $asked_question_id)
    {
        $upper_banner = UpperBanner::latest()->first();
        $user = Auth::user();
        $posts_read = Post::latest()->with('like')->where('published', '1')->paginate(6);
        $asked_question = Help::find($asked_question_id);
        $right_banners = RightBanner::all()->where('published', '1');
        $left_banners = LeftBanner::all()->where('published', '1');
        return view('faq.categories_asked_questions.asked_questions.show', compact('user', 'posts_read', 'asked_question', 'right_banners', 'left_banners', 'upper_banner'));
    }
}
