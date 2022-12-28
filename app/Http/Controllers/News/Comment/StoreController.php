<?php

namespace App\Http\Controllers\News\Comment;

use App\Http\Controllers\Controller;
use App\Http\Requests\News\Comment\StoreRequest as CommentStoreRequest;
use App\Models\News;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class StoreController extends Controller
{
    public function __invoke(News $news, CommentStoreRequest $request)
    {
        $data = $request->validated();

        if (isset($data['comment_image'])) :
            $data['comment_image'] = Storage::disk('public')->put('/images',  $data['comment_image']);
        else :
            $data['comment_image'] = null;
        endif;
        if (isset($data['parent_id'])) :
            $data['parent_id'] = $data['parent_id'];
        else :
            $data['parent_id'] = null;
        endif;

        $news->comments()->create([
            'user_id' => Auth::user()->id,
            'content' =>  $data['content'],
            'comment_image' => $data['comment_image'],
            'parent_id' => $data['parent_id']
        ]);

        return redirect()->back();
    }
}
