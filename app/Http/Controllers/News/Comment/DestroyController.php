<?php

namespace App\Http\Controllers\News\Comment;

use App\Http\Controllers\Controller;
use App\Models\News;
use App\Models\Comment;
use Illuminate\Support\Facades\Auth;

class DestroyController extends Controller
{
    public function __invoke(News $news, Comment $comment)
    {

        $news->comments()->where('id', $comment->id)->delete();

        return redirect()->back();
    }
}
