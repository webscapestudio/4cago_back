<?php

namespace App\Http\Controllers\Advertisement\Comment;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Category\StoreRequest;
use App\Http\Requests\Advertisement\Comment\StoreRequest as CommentStoreRequest;
use App\Models\Comment;
use App\Models\Advertisement;
use Illuminate\Support\Facades\Auth;

class UpdateController extends Controller
{
    public function __invoke(Advertisement $advertisement, CommentStoreRequest $request)
    {
        $data = $request;

        $advertisement->comments()->update([
            'user_id' => Auth::user()->id,
            'content' =>  $data['content'],
            'comment_image' => $data['comment_image'],
        ]);

        return redirect()->back();
    }
}
