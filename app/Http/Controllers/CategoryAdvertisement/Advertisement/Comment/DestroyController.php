<?php

namespace App\Http\Controllers\CategoryAdvertisement\Advertisement\Comment;

use App\Http\Controllers\Controller;
use App\Models\Advertisement;
use App\Models\Comment;
use Illuminate\Support\Facades\Auth;

class DestroyController extends Controller
{
    public function __invoke($category_advertisement_id, $advertisement_id, Comment $comment)
    {
        $comment->replies()->delete();
        $advertisement = Advertisement::find($advertisement_id);
        $advertisement->comments()->where('id', $comment->id)->delete();

        return redirect()->back();
    }
}
