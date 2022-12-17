<?php

namespace App\Http\Controllers\CategoryAdvertisement\Advertisement\Comment;

use App\Http\Controllers\Controller;
use App\Models\Advertisement;

class EditController extends Controller
{
    public function __invoke($category_advertisement_id, $advertisement_id, Comment $comment)
    {
        dd(1111);
        return view('advertisement.comment.edit');
    }
}
