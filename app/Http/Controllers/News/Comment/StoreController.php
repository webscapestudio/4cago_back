<?php

namespace App\Http\Controllers\News\Comment;

use App\Http\Controllers\Controller;
use App\Http\Requests\News\Comment\StoreRequest as CommentStoreRequest;
use App\Models\News;
use Illuminate\Support\Facades\Auth;

class StoreController extends Controller
{
    public function __invoke(News $news, CommentStoreRequest $request)
    {
        $data = $request;

        $news->comments()->create([
            'user_id' => Auth::user()->id,
            'content' =>  $data['content'],
            'comment_image' => $data['comment_image'],
        ]);

        return redirect()->back();
    }
}
