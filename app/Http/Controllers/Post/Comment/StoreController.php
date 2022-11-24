<?php

namespace App\Http\Controllers\Post\Comment;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Category\StoreRequest;
use App\Http\Requests\Post\Comment\StoreRequest as CommentStoreRequest;
use App\Models\Post;
use Illuminate\Support\Facades\Auth;

class StoreController extends Controller
{
    public function __invoke(Post $post, CommentStoreRequest $request)
    {
        $data = $request;

        $post->comments()->create([
            'user_id' => Auth::user()->id,
            'content' =>  $data['content'],
            'comment_image' => $data['comment_image'],
        ]);

        return redirect()->back();
    }
}
