<?php

namespace App\Http\Controllers\Admin\Post;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Post\StoreRequest;
use App\Models\Post;
use Illuminate\Support\Facades\Storage;

class StoreController extends Controller
{
    public function __invoke(StoreRequest $request)
    { 
        try{
        $data=$request->validated();
        $tagIds = $data['tag_ids'];
        unset($data['tag_ids']);
        $data['post_image'] = Storage::disk('public')->put('/images',  $data['post_image'] );
        $post = Post::firstOrCreate($data);
        $post->tags()->attach($tagIds);
        return redirect()->route('admin.post.index');
        }catch(\Exception $exception){
            abort(404);
        }
    }

}
