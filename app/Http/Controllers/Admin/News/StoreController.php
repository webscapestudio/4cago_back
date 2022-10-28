<?php

namespace App\Http\Controllers\Admin\News;

use App\Http\Requests\Admin\News\StoreRequest;
use App\Http\Controllers\Controller;
use App\Models\News;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class StoreController extends Controller
{
    public function __invoke(StoreRequest $request)
    {

        $author = Auth::user();
        $data = $request->validated();
        if (isset($data['news_image'])) :
            $data['news_image'] = Storage::disk('public')->put('/images',  $data['news_image']);
        endif;
        $post = News::create([
            'title' =>  $request->title,
            'description' => $request->description,
            'content' =>  $request->content,
            'news_image' => $data['news_image'],
            'user_id' => $author->id,
            'is_published' =>  $request->published,
            'is_banned' =>  0,
            'likes' =>  0,
            'dislikes' =>  0,

        ]);
        $post->save();

        return redirect()->route('admin.news.index');
    }
}
