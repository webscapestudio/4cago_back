<?php

namespace App\Http\Controllers\Personal\Post;

use App\Http\Controllers\Controller;
use App\Http\Requests\Personal\Post\StoreRequest;
use App\Models\Post;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class StoreController extends Controller
{
    public function __invoke(StoreRequest $request)
    {
        $author = Auth::user();
        $data = $request->validated();

        if (isset($data['tags'])) :
            $tagIds = $data['tags'];
            unset($data['tags']);
        endif;
        if (isset($data['post_image'])) :
            $data['post_image'] = Storage::disk('public')->put('/images',  $data['post_image']);
        else :
            $data['post_image'] = null;
        endif;

        $post = Post::create([
            'category_id' =>  $request->category_id,
            'title' =>  $request->title,
            'content' =>  $request->content,
            'post_image' => $data['post_image'],
            'user_id' => $author->id,
            'published' =>  $request->published,
        ]);

        if (isset($tagIds)) :
            $post->tags()->attach($tagIds);
        endif;

        $post->save();
        return redirect()->route('personal.main.index');
    }
}
