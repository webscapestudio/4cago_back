<?php

namespace App\Http\Controllers\Admin\News;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\News\UpdateRequest;
use App\Models\News;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class UpdateController extends Controller
{
    public function __invoke(UpdateRequest $request, News $news)
    {
        $author = Auth::user();
        $data = $request->validated();
        if (isset($data['news_image'])) :
            $data['news_image'] = Storage::disk('public')->put('/images',  $data['news_image']);
        endif;
        $news->update($data);
        return view('admin.news.show', compact('news'));
    }
}
