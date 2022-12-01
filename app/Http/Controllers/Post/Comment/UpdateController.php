<?php

namespace App\Http\Controllers\Post\Comment;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Category\StoreRequest;
use App\Http\Requests\Post\Comment\StoreRequest as CommentStoreRequest;
use App\Models\Comment;
use App\Models\Post;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class UpdateController extends Controller
{
    public function __invoke(Post $post, CommentStoreRequest $request)
    {
        $data = $request;
        if (isset($data['comment_image'])) :
            $data['comment_image'] = Storage::disk('public')->put('/images',  $data['comment_image']);
        endif;
        $post->comments()->update([
            'user_id' => Auth::user()->id,
            'content' =>  $data['content'],
            'comment_image' => $data['comment_image'],
        ]);

        return redirect()->back();
    }
}
