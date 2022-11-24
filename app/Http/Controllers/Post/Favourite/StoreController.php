<?php

namespace App\Http\Controllers\Post\Favourite;

use App\Http\Controllers\Controller;
use App\Models\Post;
use Illuminate\Support\Facades\Auth;

class StoreController extends Controller
{

    public function __invoke(Post $post)
    {
        $post = Post::find($post->id);
        if (Auth::user()->hasFavouritedPost($post)) :
            $post->favourite()->where('user_id', Auth::user()->id)->delete();
            return redirect()->back();
        endif;
        $post->favourite()->create(['user_id' => Auth::user()->id]);

        return redirect()->back();
    }
}
