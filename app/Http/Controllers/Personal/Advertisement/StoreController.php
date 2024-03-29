<?php

namespace App\Http\Controllers\Personal\Advertisement;

use App\Http\Controllers\Controller;
use App\Http\Requests\Personal\Advertisement\StoreRequest;
use App\Models\Advertisement;
use Illuminate\Http\Request;
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
        if (isset($data['advertisement_image'])) :
            $data['advertisement_image'] = Storage::disk('public')->put('/images',  $data['advertisement_image']);
        else :
            $data['advertisement_image'] = null;
        endif;
        $advertisement = Advertisement::create([
            'category_advertisement_id' =>  $request->category_advertisement_id,
            'title' =>  $request->title,
            'content' =>  $request->content,
            'advertisement_image' => $data['advertisement_image'],
            'user_id' => $author->id,
            'published' =>  $request->published,
            'description' =>  $request->description,
        ]);
        if (isset($tagIds)) :
            $advertisement->tags()->attach($tagIds);
        endif;

        $advertisement->save();
        return redirect()->route('personal.advertisement.index');
    }
}
