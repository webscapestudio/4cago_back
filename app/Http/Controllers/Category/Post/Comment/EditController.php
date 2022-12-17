<?php

namespace App\Http\Controllers\Category\Post\Comment;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Category\StoreRequest;
use App\Http\Requests\Post\Comment\StoreRequest as CommentStoreRequest;
use App\Models\Category;
use App\Models\Post;
use App\Models\Tag;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class EditController extends Controller
{
    public function __invoke($category_id, $post_id, CommentStoreRequest $request)
    {
        dd(1111);
        return view('posts.comment.edit');
    }
}
