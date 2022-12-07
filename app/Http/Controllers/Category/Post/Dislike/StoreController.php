<?php

namespace App\Http\Controllers\Category\Post\Dislike;

use App\Http\Controllers\Controller;
use App\Models\Post;
use Illuminate\Support\Facades\Auth;

class StoreController extends Controller
{

    public function __invoke($category_id, $post_id)
    {
        $post = Post::find($post_id);
        if (Auth::user()->hasDislikedPost($post)) :
            $post->dislike()->where('user_id', Auth::user()->id)->delete();
            return redirect()->back();
        endif;
        $post->dislike()->create(['user_id' => Auth::user()->id]);

        return redirect()->back();
    }
}
