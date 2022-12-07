<?php

namespace App\Http\Controllers\Category\Post\Comment;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Category\StoreRequest;
use App\Http\Requests\Post\Comment\StoreRequest as CommentStoreRequest;
use App\Models\Post;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class StoreController extends Controller
{
    public function __invoke($category_id, $post_id, CommentStoreRequest $request)
    {
        $post = Post::find($post_id);
        $data = $request;
        if (isset($data['comment_image'])) :
            $data['comment_image'] = Storage::disk('public')->put('/images',  $data['comment_image']);
        endif;
        $post->comments()->create([
            'user_id' => Auth::user()->id,
            'content' =>  $data['content'],
            'comment_image' => $data['comment_image'],
        ]);

        return redirect()->back();
    }
}
