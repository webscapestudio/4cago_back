<?php

namespace App\Http\Controllers\Personal\Work;

use App\Http\Controllers\Controller;
use App\Http\Requests\Personal\Work\StoreRequest;
use App\Models\Work;
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
        if (isset($data['work_image'])) :
            $data['work_image'] = Storage::disk('public')->put('/images',  $data['work_image']);
        else :
            $data['work_image'] = null;
        endif;

        $work = Work::create([
            'category_work_id' =>  $request->category_work_id,
            'title' =>  $request->title,
            'content' =>  $request->content,
            'work_image' => $data['work_image'],
            'user_id' => $author->id,
            'published' =>  $request->published,
            'description' =>  $request->description,
        ]);

        if (isset($tagIds)) :
            $work->tags()->attach($tagIds);
        endif;

        $work->save();

        return redirect()->route('personal.work.index');
    }
}
