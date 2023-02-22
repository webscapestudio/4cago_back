<?php

namespace App\Http\Controllers\Category\Post\Like;

use App\Http\Controllers\Controller;
use App\Models\Post;
use Illuminate\Support\Facades\Auth;

class StoreController extends Controller
{

    public function __invoke($category_id, $post_id)
    {
        $post = Post::find($post_id);
        if (Auth::user()->hasLikedPost($post)) :
            $post->like()->where('user_id', Auth::user()->id)->delete();
            return response()->json($post);
        endif;
        $post->like()->create(['user_id' => Auth::user()->id]);

        return response()->json($post);
    }
}
