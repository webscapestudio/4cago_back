<?php

namespace App\Http\Controllers\Admin\Post;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\Admin\Post\UpdateRequest;
use App\Models\Post;
use Illuminate\Support\Facades\Storage;
class UpdateController extends Controller
{
    public function __invoke(UpdateRequest $request, Post $post)
    {
        $data=$request->validated();
        $tagIds = $data['tag_ids'];
        unset($data['tag_ids']);
        $data['post_image'] = Storage::disk('public')->put('/images',  $data['post_image'] );
        $post->update($data);
        $post->tags()->sync($tagIds);
        return view('admin.posts.show', compact('post'));
    }

}
