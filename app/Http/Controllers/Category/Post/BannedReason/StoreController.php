<?php

namespace App\Http\Controllers\Category\Post\BannedReason;

use App\Http\Controllers\Controller;
use App\Http\Requests\Post\BannedReason\StoreRequest;
use App\Models\Post;
use Illuminate\Support\Facades\Auth;

class StoreController extends Controller
{
    public function __invoke($category_id, $post_id, StoreRequest $request)
    {

        $post = Post::find($post_id);
        $data = $request->validated();

        $post->banned_reason()->create([
            'user_id' => Auth::user()->id,
            'banned_reason' =>  $data['banned_reason'],
            'other_report' => $data['other_report'],
            'status' => '0'
        ]);

        return redirect()->back();
    }
}
