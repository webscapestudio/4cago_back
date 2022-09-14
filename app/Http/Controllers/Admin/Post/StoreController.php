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
        $data=$request->validated();
        $data['post_image'] = Storage::put('/images',  $data['post_image'] );
        Post::firstOrCreate($data);
        return redirect()->route('admin.post.index');
    }

}
