<?php

namespace App\Http\Controllers\Advertisement\Comment;

use App\Http\Controllers\Controller;
use App\Models\Advertisement;
use App\Models\Comment;
use Illuminate\Support\Facades\Auth;

class DestroyController extends Controller
{
    public function __invoke(Advertisement $advertisement, Comment $comment)
    {

        $advertisement->comments()->where('id', $comment->id)->delete();

        return redirect()->back();
    }
}
