<?php

namespace App\Http\Controllers\Personal\Advertisement;

use App\Http\Controllers\Controller;
use App\Http\Requests\Personal\Post\UpdateRequest;
use App\Models\Advertisement;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class UpdateController extends Controller
{
    public function __invoke(UpdateRequest $request, Advertisement $advertisement)
    {
        $author = Auth::user();
        $data = $request;
        dd($data);
        if (isset($data['tag_ids'])) :
            $tagIds = $data['tag_ids'];
            unset($data['tag_ids']);
        endif;
        if (isset($data['advertisement_image'])) :
            $data['advertisement_image'] = Storage::disk('public')->put('/images',  $data['advertisement_image']);
        endif;


        if (isset($tagIds)) :
            $advertisement->tags()->sync($tagIds);
        endif;
        $advertisement->update($data);
        return redirect()->route('personal.advertisement.index');
    }
}
