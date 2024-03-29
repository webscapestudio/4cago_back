<?php

namespace App\Http\Controllers\CategoryAdvertisement\Advertisement\Comment;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Category\StoreRequest;
use App\Http\Requests\Advertisement\Comment\StoreRequest as CommentStoreRequest;
use App\Models\Advertisement;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class StoreController extends Controller
{
    public function __invoke($category_advertisement_id, $advertisement_id, CommentStoreRequest $request)
    {
        $advertisement = Advertisement::find($advertisement_id);
        $data = $request->validated();
        if (empty($data['comment_image'])) :
            $data['comment_image'] = null;
        endif;
        if (isset($data['comment_image'])) :
            $data['comment_image'] = Storage::disk('public')->put('/images',  $data['comment_image']);
        endif;
        if (isset($data['parent_id'])) :
            $data['parent_id'] = $data['parent_id'];
        else :
            $data['parent_id'] = null;
        endif;
        $advertisement->comments()->create([
            'user_id' => Auth::user()->id,
            'content' =>  $data['content'],
            'comment_image' => $data['comment_image'],
            'category_advertisement_id' => $category_advertisement_id,
            'parent_id' => $data['parent_id']
        ]);

        return redirect()->back();
    }
}
