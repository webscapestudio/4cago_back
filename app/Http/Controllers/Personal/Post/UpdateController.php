<?php

namespace App\Http\Controllers\Personal\Post;

use App\Http\Controllers\Controller;
use App\Http\Requests\Personal\Post\UpdateRequest;
use App\Models\Post;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class UpdateController extends Controller
{
    public function __invoke(UpdateRequest $request, $slug)
    {
        $post = Post::whereSlug($slug)->firstOrFail();
        $author = Auth::user();
        $data = $request->validated();

        if (isset($data['tags'])) :
            $tagIds = $data['tags'];
            unset($data['tags']);
        endif;
        if (isset($data['post_image'])) :
            $data['post_image'] = Storage::disk('public')->put('/images',  $data['post_image']);
        endif;

        $post->update($data);
        if (isset($tagIds)) :
            $post->tags()->sync($tagIds);
        endif;
        return redirect()->route('personal.main.index');
    }
}
